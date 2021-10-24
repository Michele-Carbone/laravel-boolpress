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




Route::get('/posts', 'Api\PostController@index');   //rotta Api che ci chiama le Api CRUD   //primo parametro per avere l Url per avere le condizioni rest e' posts (nome della risorsa al plurale) //secondo parametro cartella Api/ nome del file controller
