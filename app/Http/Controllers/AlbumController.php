<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AlbumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);;
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
        $status = $request->status;

        $matches = array();
        if ($name) {
            $matches["name"] = $name;
        }
        if ($author) {
            $matches["created_by"] = $author;
        }
        if ($status != null) {
            $matches["status"] = $status;
        }
        
        $albums = Album::where($matches)
        ->orderBy('created_at', 'desc')
        ->when(Auth::check() && Auth::user()->role_id == 2, function ($query) {
            return $query->where('created_by', Auth::user()->username);
        })
        ->customPaginate($limit, $offset)->get();
        $total = Album::where($matches)
        ->when(Auth::check() && Auth::user()->role_id == 2, function ($query) {
            return $query->where('created_by', Auth::user()->username);
        })
        ->count();

        $albums = $albums->map(function ($album) {
            $album->created_at_carbon = $album->created_at->diffForHumans();
            if ($album->status == 1) {
                $album->status = 'Active';
                return $album;
            } else {
                $album->status = 'Disable';
                return $album;
            }
        });
        return [$albums, $total];
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
        $author = Auth::user()->username;
        $name = $request->name;
        $post_id = $request->post_id;
        $album = Album::create(['name' => $name, 'created_by' => $author, 'post_id' => $post_id]);

        return response()->json($album, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::find($id);
        return $album;
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
        $album = Album::find($id);
        $album->name = $request->title;
        $album->status = $request->status;
        $album->post_id = $request->post_id;
        $album->save();

        return response()->json($album, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();

        return response()->json(null, 204);
    }
}
