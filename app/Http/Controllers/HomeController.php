<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

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
        return view('user.user_profile', ['user_slug' => $user_slug]);
    }

    public function profiles_edit(Request $request)
    {
        $user_slug = $request->user_slug;
        return view('user.user_profile_edit', ['method' => 'edit', 'user_slug' => $user_slug]);
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

    //Page
    public function pages()
    {
        return view('page.page');
    }

    public function add_page()
    {
        return view('page.add_page');
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
