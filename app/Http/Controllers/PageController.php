<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserViewedPost;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $projects =  Post::where('scheduling_post', '<=', Carbon::now()->timestamp * 1000)
        ->where('category', 'projects')
        ->orderBy(DB::raw('RAND()'))
        ->limit(2)
        ->get();
        $slide_posts =  Post::with(['tags'])
        ->where('scheduling_post', '<=', Carbon::now()->timestamp * 1000)
        ->where('category', 'ideabooks')
        ->orderBy(DB::raw('RAND()'))
        ->limit(6)
        ->get();
        return view('frontend.index', [
            'projects' => $projects,
            'slide_posts' => $slide_posts
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function policy()
    {
        return view('frontend.policy');
    }

    public function services()
    {
        return view('frontend.services');
    }

    public function service($service_slug)
    {
        return view('frontend.project_details');
    }

    public function projects(Request $request)
    {
        $banner = "Dự án nội thất";
        $desc = "Thiết kế nội thất, thi công nội thất, trang trí nội thất";
        $tag = $request->tag;
        $slide_posts =  Post::with(['tags'])
        ->where('scheduling_post', '<=', Carbon::now()->timestamp * 1000)
        ->where('category', 'projects')
        ->orderBy(DB::raw('RAND()'))
        ->limit(6)
        ->get();
        return view('frontend.blog_home', [
            'category' => 'projects',
            'slide_posts' => $slide_posts, 
            'filter_tag' => $tag,
            'banner' => $banner,
            'desc' => $desc
        ]);
    }

    public function project($project_slug)
    {
        $post = Post::where('slug', $project_slug)->first();
        event(new UserViewedPost($post));
        $photos = DB::table('posts')
        ->join('albums', 'posts.id', '=', 'albums.post_id')
        ->join('photos', 'albums.id', '=', 'photos.album_id')
        ->select('photos.image_url')
        ->where('posts.id', $post->id)
        ->get();

        return view('frontend.project_details',['post_id' => $post->id, 'photos' => $photos]);
    }

    public function ideabooks(Request $request)
    {
        $banner = "Tư vấn nội thất";
        $desc = "Thiết kế nội thất, thi công nội thất, trang trí nội thất";
        $tag = $request->tag;
        $slide_posts =  Post::with(['tags'])
        ->where('scheduling_post', '<=', Carbon::now()->timestamp * 1000)
        ->where('category', 'ideabooks')
        ->orderBy(DB::raw('RAND()'))
        ->limit(6)
        ->get();
        return view('frontend.blog_home', [
            'category' => 'ideabooks', 
            'slide_posts' => $slide_posts, 
            'filter_tag' => $tag,
            'banner' => $banner,
            'desc' => $desc
        ]);
    }

    public function ideabook($ideabook_slug)
    {
        $post = Post::where('slug', $ideabook_slug)->first();
        event(new UserViewedPost($post));
        return view('frontend.blog_single',['post' => $post]);
    }
}
