<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.welcome');   //pke abbiamo spostato la pagina welcome in guest
});

Auth::routes(['register' => false]);  //register =>false lo facciamo pke il blog che stiamo creando non dara' accesso ad altri users

Route::get('/admin', 'HomeController@index')->name('home');  //bisogna andare nella HomeController@index per modificare la route aggiungendo la cartella admin
