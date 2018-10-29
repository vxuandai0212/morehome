<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\ActivityLog;

class CommentController extends Controller
{
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

        return response()->json($act_logs, 201);
    }

    public function get_comment_in_post($post_id)
    {
        
    }
}
