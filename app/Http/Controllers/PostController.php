<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $total = Post::all()->count();
        $posts = Post::all()->slice($offset)->take($limit);
        $posts = $posts->map(function ($post) {
            $post->created_at_carbon = $post->created_at->diffForHumans();
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
        $post->status = $request->page_status;
        $post->created_by = Auth::user()->username;

        $post->save();

        foreach($request->tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag->id);
        }
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
            'comments.users:name', 
            'comments.replies', 
            'comments.replies.users:name',
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
        $post = Post::find($request->id);
        $post->name = $request->name;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->keywords = $request->keywords;
        $post->category = $request->category;
        $post->display_in_menu = $request->display_in_menu;
        $post->scheduling_post = $request->scheduling_post;
        $post->view_url = '/'.$request->category.'/'.str_slug($request->title);
        $post->edit_url = '/posts/edit/'.str_slug($request->title);
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->status = $request->status;
        $post->save();

        $post->tags()->sync($request->tags);

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
}
