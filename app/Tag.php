<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];

    public function pages()
    {
        return $this->morphedByMany('App\Page', 'taggable');
    }

    public function photos()
    {
        return $this->morphedByMany('App\Photo', 'taggable');
    }
}
