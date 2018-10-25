<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AlbumController extends Controller
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
        $total = Album::all()->count();
        $albums = Album::all()->slice($offset)->take($limit);
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
        $album = Album::create(['name' => $name, 'created_by' => $author]);

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
