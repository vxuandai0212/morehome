<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $hidden = array('pivot');
    
    protected $fillable = [
        'content',
        'parent_comment_id' 
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'activity_logs')->wherePivot('action_type_id', 10);
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'activity_logs', 'comment_id', 'root_user_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Comment', 'parent_comment_id');
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
