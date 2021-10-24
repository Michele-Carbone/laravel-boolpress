<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Per effettuare la chiamata Api dei nostri post per prima cosa importiamo Models/Post sopra
        //ci chiamiamo tutti i Post
        //Dato che ci deve restituire un json e dato che abbiamo una collection Laravel lo capisce e non dobbiamo riscrivere tutto quanto come nell esempio del test ma basta richiamarlo all interno di json($posts)

        $posts = Post::paginate(5);

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*primo metodo
        $post = Post::findOrFail($id);
        $post->delete();
        */
        //secondo metodo
        Post::destroy($id);

        return response('', 204);    //con un json non ci si aspetta una vera e propria risposta pero' e' utile metterla come in questo caso    //con postman possiamo verifichere se e' corretto quello scritto
    }
}
