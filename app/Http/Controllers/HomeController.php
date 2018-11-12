<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    // User
    public function users()
    {
        return view('user.user');
    }

    public function profiles(Request $request)
    {
        $user_slug = $request->user_slug;
        $user = User::where('slug', $user_slug)->first();
        return view('user.user_profile', ['user_id' => $user->id, 'user_slug' => $user_slug]);
    }

    public function profiles_edit(Request $request)
    {
        $user_slug = $request->user_slug;
        $user = User::where('slug', $user_slug)->first();
        return view('user.user_profile_edit', ['user_id' => $user->id, 'method' => 'edit', 'user_slug' => $user_slug]);
    }

    public function add()
    {
        return view('user.user_add');
    }

    public function activities()
    {
        return view('user.user_activity_log');
    }

    public function manage_role()
    {
        return view('role.manage_role');
    }

    public function add_role()
    {
        return view('role.add_role');
    }

    //Post
    public function posts()
    {
        return view('post.post');
    }

    public function add_post()
    {
        return view('post.add_post');
    }

    public function edit_post($post_slug)
    {
        $post = Post::where('slug', $post_slug)->first();
        return view('post.edit_post', ['post' => $post]);
    }

    //Photo
    public function photos()
    {
        return view('photo.photo');
    }

    public function albums($album_slug)
    {
        $album = Album::where('slug', $album_slug)->first();
        return view('photo.album', ['album' => $album]);
    }
}
