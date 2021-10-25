<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'slug', 'color'];
    //chimare i tanti post //$category->posts

    public function posts() //importante rispettare la convenzione scrivendo posts al plurale se vogliamo che funzioni
    {
        return $this->hasMany('App\Models\Post');   //percorso del collegamento Post
    }
}
