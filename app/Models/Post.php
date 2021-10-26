<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'slug', 'image', 'category_id', 'user_id'];

    public function getFormattedDate($column, $format = 'd-m-Y H:i:s')
    {
        return Carbon::create($this->$column)->format($format);
    }

    public function category()
    {   //belongsTo() si aspetta al suo interno una stringa e non basta importare il collegamento in alto e scrivere Category al suo interno ma si deve passare il collegamento intero come stringa
        return $this->belongsTo('App\Models\Category');
    }
    /*Ricerca per user
    public function user()
    {
        //laravel posiziona User.php in App e' giusto non spostarlo pke sicuramente qualcosa lui la fara' sottobanco
        return $this->belongsTo('App\User');
    }
    */
    //Ricerca per author Se si vuole cambiare senza rispettare le convenzioni di laravel
    public function author()
    {
        //Passare il secondo parametro per dirgli dove deve cerca
        return $this->belongsTo('App\User', 'user_id');
    }
}
