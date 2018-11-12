<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;
use Illuminate\Support\Facades\Auth;

class UserActivityController extends Controller
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
    
    public function likes(Request $request)
    {
        $like = ActivityLog::create([
            'root_user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'has_like' => 1,
            'action_type_id' => 16
        ]);

        return response()->json($like, 201);
    }

    public function unlikes($like_id)
    {
        $like = ActivityLog::find($like_id);
        $like->delete();

        return response()->json(null, 204);
    }

    public function bookmarks(Request $request)
    {
        $bookmark = ActivityLog::create([
            'root_user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'has_bookmark' => 1,
            'action_type_id' => 18
        ]);

        return response()->json($bookmark, 201);
    }

    public function unbookmarks($bookmark_id)
    {
        $bookmark = ActivityLog::find($bookmark_id);
        $bookmark->delete();

        return response()->json(null, 204);
    }

    public function rates(Request $request)
    {
        $rate = ActivityLog::create([
            'root_user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'rate' => $request->rate,
            'action_type_id' => 20
        ]);

        return response()->json($rate, 201);
    }

    public function update_rate(Request $request, $rate_id)
    {
        $rate = ActivityLog::find($rate_id);
        $rate->rate = $request->rate;
        $rate->save();

        return response()->json($rate, 201);
    }
}
