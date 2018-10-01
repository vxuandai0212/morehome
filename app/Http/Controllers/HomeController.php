<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function profiles()
    {
        return view('user.user_profile');
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

    public function albums()
    {
        return view('photo.album');
    }
}
