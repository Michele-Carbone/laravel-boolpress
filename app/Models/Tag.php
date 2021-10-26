<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //tag che ha molti posts
    public function posts()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
