<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Cloudder;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'photo_in_project');
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
        $categories_id = $request->categories_id;
        $tags_id = $request->tags_id;

        $photos = Photo::where('album_id', $request->album_id)
        ->with(['categories','tags'])
        ->when($name, function ($query, $name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->when($categories_id, function ($query, $categories_id) {
            return $query->whereHas('categories', function ($query) use ($categories_id) {
                $query->whereIn('categories.id', $categories_id);
            }, ">=", count($categories_id));
        })
        ->when($tags_id, function ($query, $tags_id) {
            return $query->whereHas('tags', function ($query) use ($tags_id) {
                $query->whereIn('tags.id', $tags_id);
            }, ">=", count($tags_id));
        })
        ->orderBy('created_at', 'desc')
        ->customPaginate($limit, $offset)
        ->get();

        $total = Photo::where('album_id', $request->album_id)
        ->when($name, function ($query, $name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->when($categories_id, function ($query, $categories_id) {
            return $query->whereHas('categories', function ($query) use ($categories_id) {
                $query->whereIn('categories.id', $categories_id);
            }, ">=", count($categories_id));
        })
        ->when($tags_id, function ($query, $tags_id) {
            return $query->whereHas('tags', function ($query) use ($tags_id) {
                $query->whereIn('tags.id', $tags_id);
            }, ">=", count($tags_id));
        })
        ->count();
        
        $photos = $photos->map(function ($photo) {
            $photo->created_at_carbon = $photo->created_at->diffForHumans();
            if ($photo->status == 1) {
                $photo->status = 'Active';
                return $photo;
            } else {
                $photo->status = 'Disable';
                return $photo;
            }
        });
        return [$photos, $total];
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

        $photo = new Photo;
        $photo->album_id = $request->photo['album_id'];
        $photo->name = $request->photo['name'];
        $photo->view_count = 0;
        $photo->image_url = $image_url;
        $photo->status = $request->photo['status'];
        $photo->created_by = Auth::user()->username;
        $photo->save();
        
        $photo->categories()->sync($request->photo['categories']);
        $photo->tags()->sync($request->photo['tags']);

        return response()->json($photo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        $categories_id = $request->photo['categories'];
        $tags_id = $request->photo['tags'];

        $image_url = '';
        if ($request->photo_is_new) {
            if($request->get('image'))
            {
            $image = $request->get('image');
            Cloudder::upload($image);
            }
            $result = Cloudder::getResult();
            $image_url = $result['url'];
        }
        
        $photo = Photo::find($request->photo['id']);
        $photo->name = $request->photo['name'];
        if ($image_url != '') {
            $photo->image_url = $image_url;
        }
        $photo->status = $request->photo['status'] == 1 || $request->photo['status'] == 'Active' ? 1 : 0;
        $photo->save();
        
        $photo->categories()->sync($categories_id);
        $photo->tags()->sync($tags_id);

        return response()->json($photo, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();

        return response()->json(null, 204);
    }

    public function photo_in_project(Request $request)
    {
        $post_id = $request->post_id;

        $photos = DB::table('posts')
        ->join('albums', 'posts.id', '=', 'albums.post_id')
        ->join('photos', 'albums.id', '=', 'photos.album_id')
        ->select('photos.image_url')
        ->where('posts.id', $post_id)
        ->get();

        return response()->json($photos, 201);
    }
}
