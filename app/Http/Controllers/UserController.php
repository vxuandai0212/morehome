<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mail\UserCreated;
use Cloudder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);;
    }

    public function index(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;
        $name = $request->name;
        $username = $request->username;
        $role_id = $request->role_id;
        $status = $request->status;
        $users = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('users.*', 'roles.name as role_name')
        ->when($name, function ($query, $name) {
            return $query->where('name', $name);
        })
        ->when($username, function ($query, $username) {
            return $query->where('username', $username);
        })
        ->when($role_id, function ($query, $role_id) {
            return $query->where('role_id', $role_id);
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->orderBy('created_at', 'desc')
        ->when($offset, function ($query, $offset) {
            return $query->offset($offset);
        })
        ->when($limit, function ($query, $limit) {
            return $query->limit($limit);
        }, function ($query) {
            return $query->limit(10);
        })
        ->get();

        $total = DB::table('users')
        ->when($name, function ($query, $name) {
            return $query->where('name', $name);
        })
        ->when($username, function ($query, $username) {
            return $query->where('username', $username);
        })
        ->when($role_id, function ($query, $role_id) {
            return $query->where('role_id', $role_id);
        })
        ->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->count();

        return [$users, $total];
    }

    public function show($user_id)
    {
        $user = User::with(['role','posts.tags', 'posts.author'])->find($user_id);
        return $user;
    }

    public function store(Request $request)
    {
        $email = $request->email;
        $user = new User;
        $user->username = $request->username;
        $user->email = $email;
        $user->password = Hash::make($request->password);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role;
        $user->status = $request->status;
        $user->save();

        if ($request->send_email)
        {
            Mail::to($request->email)->send(new UserCreated($user, $request->password));
        }

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $update_user = $request->user;
        if ($request->image_is_new) {
            if($request->get('image'))
            {
               $image = $request->get('image');
               Cloudder::upload($image);
            }
            $result = Cloudder::getResult();
            $image_url = $result['url'];
            $update_user['avatar_url'] = $image_url;
        }
        $user = User::find( $update_user['id']);
        $user->update($update_user);

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    public function personal($username)
    {
        $user = User::where("username", $username)->first();
        return view('frontend.personal_page',['user' => $user]);
    }

    public function profile($username)
    {
        $user = User::where("username", $username)->first();
        return view('frontend.profile',['user' => $user]);
    }
}
