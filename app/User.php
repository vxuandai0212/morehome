<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'name', 
        'email', 
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'biography',
        'avatar_url',
        'address',
        'role_id',
        'phonenumber',
        'created_by',
        'slug',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pivot'
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post', 'activity_logs', 'root_user_id', 'post_id')->wherePivot('action_type_id', 18);
    }

    public function comments()
    {
        return $this->belongsToMany('App\Comment', 'activity_logs');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }

    public function isAdmin()
    {
        return $this->role_id < 3;
    }
}
