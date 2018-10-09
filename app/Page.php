<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 
        'title', 
        'description', 
        'keywords',
        'level_page',
        'parent_page',
        'display_in_menu',
        'scheduling_post',
        'template_url',
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
