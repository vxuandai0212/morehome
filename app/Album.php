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
        'post_id',
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

    public function scopeCustomPaginate($query, $limit, $offset)
    {
        if ($offset != 0) {
            return $query->skip($offset)->take($limit);
        } else {
            return $query->take($limit);
        }
    }
}
