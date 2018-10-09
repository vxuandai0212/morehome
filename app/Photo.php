<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'album_id', 
        'name',
        'view_count', 
        'image_url',
        'status',
        'created_by'
    ];

    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_photo');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
