<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name'
    ];

    public function photos()
    {
        return $this->belongsToMany('App\Photo', 'category_photo');
    }
}
