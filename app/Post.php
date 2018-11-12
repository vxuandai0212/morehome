<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 
        'title', 
        'view_count',
        'description', 
        'keywords',
        'category',
        'display_in_menu',
        'scheduling_post',
        'template_url',
        'view_url',
        'edit_url',
        'content',
        'text_content',
        'short_content',
        'thumbnail_url',
        'status',
        'created_by',
        'created_at',
        'slug'
    ];


    protected $appends = [
        'avg_rate', 
        'current_user_has_like',
        'current_user_has_bookmark',
        'current_user_rate',
        'previous_post',
        'next_post',
        'top_four'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function id()
    {
        return $this->id;
    }
    
    public function author()
    {
        return $this->belongsTo('App\User', 'created_by', 'username');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'activity_logs')->wherePivot('action_type_id', 10);
    }

    public function user_interactions()
    {
        return $this->hasMany('App\ActivityLog', 'post_id');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'activity_logs', 'post_id', 'root_user_id')->wherePivot('action_type_id', 16);
    }

    public function bookmarks()
    {
        return $this->belongsToMany('App\User', 'activity_logs', 'post_id', 'root_user_id')->wherePivot('action_type_id', 18);
    }

    public function rates()
    {
        return $this->belongsToMany('App\User', 'activity_logs', 'post_id', 'root_user_id')->wherePivot('action_type_id', 20);
    }

    public function getCurrentUserHasLikeAttribute()
    {
        if (Auth::check()) {
            return ActivityLog::select('activity_logs.id')->where('post_id', $this->id)->where('root_user_id', Auth::user()->id)->where('action_type_id', 16)->get();
        } else {
            return [];
        }
    }

    public function getCurrentUserHasBookmarkAttribute()
    {
        if (Auth::check()) {
            return ActivityLog::select('activity_logs.id')->where('post_id', $this->id)->where('root_user_id', Auth::user()->id)->where('action_type_id', 18)->get();
        } else {
            return [];
        }
    }

    public function getCurrentUserRateAttribute()
    {
        if (Auth::check()) {
            return ActivityLog::select('activity_logs.id','activity_logs.rate')->where('post_id', $this->id)->where('root_user_id', Auth::user()->id)->where('action_type_id', 20)->get();
        } else {
            return [];
        }
    }

    public function getAvgRateAttribute()
    {
        $rate = ActivityLog::where('post_id', $this->id)->where('action_type_id', 20)->avg('rate');
        return round($rate, 1);
    }

    public function getPreviousPostAttribute()
    {
        $previous_post = DB::table('posts')
        ->join('users', 'users.username', '=', 'posts.created_by')
        ->select('posts.title', 'posts.view_url', 'users.id', 'users.avatar_url')
        ->where('posts.id', '<', $this->id)
        ->where('posts.category', $this->category)
        ->first();
        return $previous_post;
    }

    public function getNextPostAttribute()
    {
        $next_post = DB::table('posts')
        ->join('users', 'users.username', '=', 'posts.created_by')
        ->select('posts.title', 'posts.view_url', 'users.id', 'users.avatar_url')
        ->where('posts.id', '>', $this->id)
        ->where('posts.category', $this->category)
        ->first();
        return $next_post;
    }

    public function getTopFourAttribute()
    {
        $posts = DB::table('posts')
        ->select('title', 'view_url', 'thumbnail_url', 'created_at')
        ->where('posts.category', $this->category)
        ->orderBy('view_count', 'desc')
        ->take(5)
        ->get();
        return $posts;
    }

    public function scopeCustomPaginate($query, $limit, $offset)
    {
        if ($offset != 0) {
            return $query->skip($offset)->take($limit);
        } else {
            return $query->take($limit);
        }
    }
}
