<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;        //importiamo da models Post.php
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        //
        $posts = Post::orderBy('id', 'desc')->paginate(10);    //impaginazione di 10 elementi   //ordine per id e decrescente

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post = new Post();

        $categories = Category::all();
        //aggiunta del tag
        $tags = Tag::all();
        return view('admin.posts.create', compact('tags', 'post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validazione
        $request->validate([
            'title' => 'required|string|unique:posts|min:3',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'nullable|exists:categories,id',    //nella validazione per non darci errore inseriamo sia nullable che exists:categories,id(se esiste il nome della tablella allora metti quello) fungono insieme da ternario pke se non c'e' uno mette l altro e viceversa
            'tags' => 'nullable|exists:tags,id'     //nella validazione accettiamo il nullable ma per evitare che uno possa manovrare l html con exists vengono accettati soli i valori che sono presenti all interno della tabella al contrario non verranno accettati

        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il minimo di caratteri per il campo :attribute è :min',
            'title.unique' => 'Il titolo inserito esiste già'
        ]);


        $data = $request->all();

        $post = new Post();
        $data['user_id'] = Auth::id();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();
        /*
        // dato che save() ci crea il post e non prima la validazione del tags va messa dopo facendo un verifica
        //se ho dei tags creo la validazione
        //array_key_exists() Se esiste la chiave tags in $data allora passami */
        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);   //prendo il post appena creato chiamo la relazione tags() e lo concateno con attach() // attach() regge come parametro o un id oppure un array di id


        return redirect()->route('admin.posts.show', compact('post'));
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
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();  //importiamo categori pke nella modifica del fomr e' necessario per far si che non ci dia errore

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Validazione
        $request->validate([
            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'min:3'],
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'nullable|exists:categories,id'
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il minimo di caratteri per il campo :attribute è :min',
            'title.unique' => 'Il titolo inserito esiste già'
        ]);

        $data = $request->all();

        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-message', 'Post cancellato con successo')->with('alert-type', 'danger');
    }
}
