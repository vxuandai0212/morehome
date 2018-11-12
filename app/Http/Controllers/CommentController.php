<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\ActivityLog;
use App\Post;
use App\Events\UserCommentedPost;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['get_comment_in_post','get_reply_in_comment']);;
    }
    
    public function comments(Request $request)
    {
        $comment_content = $request->comment_content;
        $post_id = $request->post_id;
        $parent_comment_id = $request->parent_comment_id;

        $comment = new Comment();
        if ($parent_comment_id)
        {
            $comment->parent_comment_id = $parent_comment_id;
        }
        $comment->content = $comment_content;
        $comment->save();

        $act_logs = new ActivityLog();
        $act_logs->root_user_id = Auth::user()->id;
        $act_logs->post_id = $post_id;
        $act_logs->comment_id = $comment->id;
        if ($parent_comment_id)
        {
            $act_logs->action_type_id = 13; //action replies has id 13
        } else {
            $act_logs->action_type_id = 10; //action comments has id 10
        }
        $act_logs->save();

        event(new UserCommentedPost());

        return response()->json($act_logs, 201);
    }

    public function get_comment_in_post(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $post_id = $request->post_id;

        $comments = Comment::with(['users:name,avatar_url'])
        ->withCount(['replies'])
        ->whereHas('posts', function($query) use ($post_id) {
            $query->where('posts.id', $post_id);
        })
        ->orderBy('comments.created_at', 'desc')
        ->customPaginate($limit, $offset)
        ->get();

        $total = Comment::whereHas('posts', function($query) use ($post_id) {
            $query->where('posts.id', $post_id);
        })
        ->count();
    
        return [$comments, $total];
    }

    public function get_reply_in_comment(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $parent_comment_id = $request->parent_comment_id;

        $replies = Comment::with(['users:name,avatar_url'])
        ->where('parent_comment_id', $parent_comment_id)
        ->orderBy('comments.created_at')
        ->customPaginate($limit, $offset)
        ->get();

        $total = Comment::where('parent_comment_id', $parent_comment_id)
        ->count();
    
        return [$replies, $total];
    }
}
