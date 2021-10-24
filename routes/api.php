<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Esempio di chiamata Api //possiamo verificare la chiamata che funziona andando http://127.0.0.1:8001/api/test lo vediamo pke e' in get e possiamo chiamarlo, e troviamo un json
Route::get('/test', function () {
    return response()->json([
        'students' => ['Cristina', 'Alessandra', 'Damiano', 'Rocco'],
        'teacher' => 'Marco',
        'total' => 32
    ]);
});



/*Primo metodo di chiamata
Route::get('/posts', 'Api\PostController@index');   //rotta Api che ci chiama le Api CRUD   //primo parametro per avere l Url per avere le condizioni rest e' posts (nome della risorsa al plurale) //secondo parametro cartella Api/ nome del file controller
*/

//Massimizzare la scrittura delle Api senza ripetere ogni volta il nome della cartella Api le raggruppiamo con namespace() e con group()
Route::namespace('Api')->group(function () {
    //creazione di tutte le rotte delle Api con un unico comando
    //Route::resource('posts', 'PostController');
    Route::get('/posts', 'PostController@index');
});
