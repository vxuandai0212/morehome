<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'root_user_id',
        'target_user_id',
        'photo_id',
        'album_id',
        'post_id',
        'comment_id',
        'has_like',
        'has_bookmark',
        'rate',
        'action_type_id',
    ];
}
