<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* Essendo pubblico al momento possiamo anche togliere questa parte
    /**
     * Create a new controller instance.
     *
     * @return void
    
    
    public function __construct()
    {
        $this->middleware('auth');  //i middleware sono delle funzione che accetta in ingresso la richiesta al termine della nostra richiesta decidono di restiuirci vero o falso (quindi se proseguire o no) se ce ne sono piu di una tutte seguiranno la stessa procedura
    }
    */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');  //pke abbiamo spostato la pagina home in admin
    }
}
