<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
        'status',
        'created_by',
        'created_at',
        'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
