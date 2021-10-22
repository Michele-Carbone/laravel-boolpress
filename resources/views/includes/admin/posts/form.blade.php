

@if ($post->exists) <!-- Se il post esiste allora caricalo in update se no vai in Store, dopo procedi con la compilazione/modifica del post in base ai casi-->
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @method('PATCH')
    
    @else
    <form method="POST" action="{{ route('admin.posts.store') }}">

@endif
    @csrf
    
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Scrivi il Titolo del Post" value="{{ $post->title }}">
    </div>
    
    <div class="form-group">
      <label for="content">Contenuto del post</label>
      <textarea class="form-control" id="content" name="content" rows="5" >{{ $post->content }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">immagine</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="Inserisci l'url di una immagine" value="{{ $post->image }}">
    </div>

    <button type="submit" class="btn btn-success">Salva</button>
</form>

