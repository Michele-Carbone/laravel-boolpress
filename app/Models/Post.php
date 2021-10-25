<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug', 'image'];

    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    public function category()
    {   //belongsTo() si aspetta al suo interno una stringa e non basta importare il collegamento in alto e scrivere Category al suo interno ma si deve passare il collegamento intero come stringa
        return $this->belongsTo('App\Models\Category');
    }
}
