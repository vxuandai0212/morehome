<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Cloudder;

class PhotoController extends Controller
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
        $total = Photo::where('album_id', $request->album_id)->count();
        $photos = Photo::with(['categories:name','tags:name'])->where('album_id', $request->album_id)->get()->slice($offset)->take($limit);
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
        $categories = $request->photo['categories'];
        $categories_id = collect($categories)->map(function($category) {
            if (gettype($category) == 'string') {
                $category_id = Category::where('name', $category)->first();
                return $category_id['id'];
            } else {
                return $category;
            }
        })->unique();

        $tags = $request->photo['tags'];
        $tags_id = collect($tags)->map(function($tag) {
            if (gettype($tag) == 'string') {
                $tag_id = Tag::where('name', $tag)->first();
                return $tag_id['id'];
            } else {
                return $tag;
            }
        })->unique();
        
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
}
