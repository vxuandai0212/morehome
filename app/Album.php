<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Album extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 
        'view_count', 
        'status',
        'created_by',
        'slug'
    ];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
