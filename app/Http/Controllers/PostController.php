<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cloudder;
use App\Jobs\PublishPost;
use App\ActivityLog;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'search', 'show', 'get_name', 'get_random']);;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $name = $request->name;
        $author = $request->author;
        $category = $request->category;
        $posted = $request->posted;
        $tag = $request->tag;

        $matches = array();
        if ($name) {
            $matches["name"] = $name;
        }
        if ($author) {
            $matches["created_by"] = $author;
        }
        if ($category) {
            $matches["category"] = $category;
        }
        
        $posts = Post::with(['tags', 'author'])->withCount(['comments'])->where($matches)
        ->when($posted, function ($query, $role) {
            return $query->where('scheduling_post', '<=', Carbon::now()->timestamp * 1000);
        })
        ->when(Auth::check() && Auth::user()->role_id == 2, function ($query) {
            return $query->where('created_by', Auth::user()->username);
        })
        ->when($tag, function ($query, $tag) {
            return $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.name', $tag);
            });
        })
        ->orderBy('created_at', 'desc')->customPaginate($limit, $offset)->get();
    

        $total = Post::where($matches)
        ->when(Auth::check() && Auth::user()->role_id == 2, function ($query) {
            return $query->where('created_by', Auth::user()->username);
        })
        ->when($tag, function ($query, $tag) {
            return $query->whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.name', $tag);
            });
        })
        ->count();

        $posts = $posts->map(function ($post) {
            $post->created_at_carbon = Carbon::parse($post->created_at)->diffForHumans();
            if ($post->status == 1) {
                $post->status = 'Active';
                return $post;
            } else {
                $post->status = 'Disable';
                return $post;
            }
        });
        return [$posts, $total];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->get('image'))
        {
           $image = $request->get('image');
           Cloudder::upload($image);
        }
        $result = Cloudder::getResult();
        $image_url = $result['url'];
        
        $post = new Post;

        $post->name = $request->name;
        $post->title = $request->title;
        $post->description = $request->desc;
        $post->keywords = $request->keywords;
        $post->category = $request->category;
        $post->display_in_menu = $request->is_menu_display;
        $post->scheduling_post = $request->time_schedule ? $request->time_schedule : 0;
        $post->template_url = $request->template;
        $post->view_url = '/'.$request->category.'/'.str_slug($request->title);
        $post->edit_url = '/posts/edit/'.str_slug($request->title);
        $post->content = $request->content;
        $post->text_content = $request->text_content;
        $post->short_content = $request->short_content;
        $post->thumbnail_url = $image_url;
        $post->status = $request->page_status;
        $post->created_by = Auth::user()->username;

        $post->save();

        foreach($request->tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag->id);
        }

        $activity_log = new ActivityLog;
        $activity_log->root_user_id = Auth::user()->id;
        $activity_log->post_id = $post->id;
        $activity_log->action_type_id = 7;

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with([
            'author',
            'author.role',
            'tags:id', 
            'likes' => function ($query) {
                $query->select('users.id');
            },
            'bookmarks' => function ($query) {
                $query->select('users.id');
            },
            'rates' => function ($query) {
                $query->select('users.id', 'activity_logs.rate');
            }
        ])->withCount([
            'user_interactions as likes_count' => function ($query) {
                $query->where('has_like', 1);
            }, 
            'user_interactions as bookmarks_count' => function ($query) {
                $query->where('has_bookmark', 1);
            },
            'user_interactions as comments_count' => function ($query) {
                $query->whereIn('action_type_id', [10, 13]);
            }
        ])->find($id);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image_url = '';
        if ($request->thumbnail_is_new) {
            if($request->get('image'))
            {
            $image = $request->get('image');
            Cloudder::upload($image);
            }
            $result = Cloudder::getResult();
            $image_url = $result['url'];
        }

        $post = Post::find($request->post['id']);
        $post->name = $request->post['name'];
        $post->title = $request->post['title'];
        $post->description = $request->post['description'];
        $post->keywords = $request->post['keywords'];
        $post->category = $request->post['category'];
        $post->display_in_menu = $request->post['display_in_menu'];
        $post->scheduling_post = $request->post['scheduling_post'];
        $post->view_url = '/'.$request->post['category'].'/'.str_slug($request->post['title']);
        $post->edit_url = '/posts/edit/'.str_slug($request->post['title']);
        $post->slug = str_slug($request->post['title']);
        $post->content = $request->post['content'];
        $post->text_content = $request->post['text_content'];
        $post->short_content = $request->post['short_content'];
        if ($image_url != '') {
            $post->thumbnail_url = $image_url;
        }
        $post->status = $request->post['status'];
        $post->save();

        $post->tags()->sync($request->post['tags']);

        return response()->json($post, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $name = $request->name;
        $posts = Post::select('id','name')->where('name','like','%'.$name.'%')
        ->when(Auth::check() && Auth::user()->role_id == 2, function ($query) {
            return $query->where('created_by', Auth::user()->username);
        })
        ->limit(20)->get();
        
        return response()->json($posts, 200);
    }

    public function get_name($post_id)
    {
        $post = Post::find($post_id);
        return response()->json($post->name, 200);
    }

    public function get_random(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $category = $request->category;
        
        $posts = Post::with(['tags'])
        ->where('scheduling_post', '<=', Carbon::now()->timestamp * 1000)
        ->where('category', $category)
        ->orderBy(DB::raw('RAND()'))
        ->customPaginate($limit, $offset)->get();
        
        return response()->json($posts, 200);
    }
}
