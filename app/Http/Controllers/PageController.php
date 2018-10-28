<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserViewedPost;
use App\Post;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function service($service_slug)
    {
        return view('frontend.project_details');
    }

    public function projects()
    {
        return view('frontend.blog_home');
    }

    public function project($project_slug)
    {
        return view('frontend.project_details');
    }

    public function ideabooks()
    {
        return view('frontend.blog_home');
    }

    public function ideabook($ideabook_slug)
    {
        $post = Post::where('slug', $ideabook_slug)->first();
        event(new UserViewedPost($post));
        return view('frontend.blog_single',['post' => $post]);
    }
}
