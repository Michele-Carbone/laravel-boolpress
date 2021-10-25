<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;        //importiamo da models Post.php
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        //
        $posts = Post::orderBy('id', 'desc')->paginate(10);    //impaginazione di 10 elementi   //ordine per id e decrescente

        return view('admin.posts.index', compact('posts'));
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
        return view('admin.posts.create', compact('post', 'categories'));
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
            'category_id' => 'nullable|exists:categories,id'    //nella validazione per non darci errore inseriamo sia nullable che exists:categories,id(se esiste il nome della tablella allora metti quello) fungono insieme da ternario pke se non c'e' uno mette l altro e viceversa
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'min' => 'Il minimo di caratteri per il campo :attribute è :min',
            'title.unique' => 'Il titolo inserito esiste già'
        ]);


        $data = $request->all();

        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();

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
        return view('admin.posts.edit', compact('post'));
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
            'image' => 'string'
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
