<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Cloudder;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $total = User::all()->count();
        $users = User::with('role')->get()->slice($offset)->take($limit);
        $users = $users->map(function ($user) {
            if ($user->status == 1) {
                $user->status = 'Authorized';
                return $user;
            } else {
                $user->status = 'Unauthorized';
                return $user;
            }
        });
        
        return [$users, $total];
    }

    public function show(Request $request)
    {
        $user_slug = $request->user_slug;
        $user = User::where('slug', $user_slug)->get();
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        if($request->get('image'))
        {
           $image = $request->get('image');
           Cloudder::upload($image);
        }
        $result = Cloudder::getResult();
        $image_url = $result['url'];

        $update_user = $request->user;
        $update_user['avatar_url'] = $image_url;
        $user = User::find( $update_user['id']);
        $user->update($update_user);

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
