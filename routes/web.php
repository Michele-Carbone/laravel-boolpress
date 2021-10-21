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
    return view('guest.home');   //pke abbiamo spostato la pagina welcome in guest  //rinominiamo la page in home
});

Auth::routes(['register' => false]);  //register =>false lo facciamo pke il blog che stiamo creando non dara' accesso ad altri users

Route::middleware('auth')->get('/admin', 'Admin\HomeController@index')->name('admin.home');  //modifichiamo in modo piu consono il nome della rotta aggiungendo la cartella //in secondo luogo per gestira la parte privata aggiungiamo nella middleware('auth') invece di farlo nel file HomeController.php tramite la funzione nel construct
