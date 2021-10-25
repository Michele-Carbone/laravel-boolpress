

@if ($post->exists) <!-- Se il post esiste allora caricalo in update se no vai in Store, dopo procedi con la compilazione/modifica del post in base ai casi-->
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @method('PATCH')
    
    @else
    <form method="POST" action="{{ route('admin.posts.store') }}">

@endif
    @csrf
    
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" placeholder="Scrivi il Titolo del Post" value="{{ old('title', $post->title) }}">
      @error('title')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
      @enderror
    </div>
    
    <div class="form-group">
      <label for="content">Contenuto del post</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" >{{ old('content', $post->content) }}</textarea>
      @error('content') {{-- Per far si che is-invalid funzioni deve stare necessariamente vicino al invalid-feedback // se ci dovessere essere qualcos altro di mezzo allora non funzione--}}
        <div class="invalid-feedback">
          {{ $message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="image">immagine</label>
      <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" placeholder="Inserisci l'url di una immagine" value="{{ old('image', $post->image) }}">
      @error('image')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
      @enderror
    </div>

    <div class="form-group">
      <label for="category_id">Categoria</label>
      <select class="form-control" id="category_id" name="category_id">
        <option>Nessuna Categoria</option>
        @foreach ($categories as $category)
            {{--Per non far cancellare la scelta che abbiamo fatto quando si presente un errore nel form aggiungendo l attrivuto value con old riuscimo a impedire questo,
            ma nella select non e' possibile farlo ma in alternativa possiamo usare nell option un @if e inserendo l attributo selected. 
            (old('category_id') == $category->id) sta significando che se avevo gia' mandato un valore id se si tienimelo--}}
            <option @if (old('category_id') == $category->id)
                selected
            @endif value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-success">Salva</button>
</form>

