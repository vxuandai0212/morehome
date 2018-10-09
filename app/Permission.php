<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo('App\Module');
    }
}
