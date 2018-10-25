<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $hidden = array('pivot');
    
    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    public function photos()
    {
        return $this->morphedByMany('App\Photo', 'taggable');
    }
}
