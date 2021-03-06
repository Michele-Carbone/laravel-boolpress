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

/*
Route::get('/', function () {
    return view('guest.home');   //pke abbiamo spostato la pagina welcome in guest  //rinominiamo la page in home
});
*/

Auth::routes(['register' => true]);  //register =>false lo facciamo pke il blog che stiamo creando non dara' accesso ad altri users



//Raggruppare tutte le rotte protette(Autentificazione)
Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('posts', 'PostController');  //rotte per CRUD implementate nella cartella Admin

    Route::resource('categories', 'CategoryController');
});



// gestiamo tutte le rotte che non sono di Auth (login, register ecc..) e neanche di Admin
Route::get('{any?}', function () {  //{any?} al posto di any si puo mettere qualunque altro nome ma si usa per convenzione, ? sta a indicare 'anche niente'
    return view('guest.home');
})->where('any', '.*');  //vuol dire prendi qualunque cosa e in qualunque quantita' (sono delle espressioni complesse .*) //il where() ci permette di decretare delle regole per i parametri dinamici
