

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
    <select class="form-control @error ('category_id') is-invalid @enderror"  id="category_id" name="category_id">
      <option value="">Nessuna Categoria</option>
      @foreach ($categories as $category)
        {{--Per non far cancellare la scelta che abbiamo fatto quando si presente un errore nel form aggiungendo l attrivuto value con old riuscimo a impedire questo,
        ma nella select non e' possibile farlo ma in alternativa possiamo usare nell option un @if e inserendo l attributo selected. 
        (old('category_id') == $category->id) sta significando che se avevo gia' mandato un valore id se si tienimelo
        si mettono due == pke l old restituisce una stringa mentre l altro ci da un numero--}}
        <option @if (old('category_id', $post->category_id) == $category->id) {{--$post->category_id non facciamo un controllo pke noi gli stiamo chiedendo una proprieta category_id di un modello $post //diverso da $post->category pke qui gli stiamo chiedendo una istanza di una categoria (category) relazionata a questo post ($post) Puo un post non avere una categoria assocciata Si quindi va effettuato il controllo e si spacca  --}}
          selected
          @endif value="{{ $category->id }}">{{ $category->name }}
        </option>
      @endforeach
    </select>
    @error('category_id')
      <div class="invalid-feedback">
        {{ $message}}
      </div>
    @enderror
  </div>
  {{--Check list--}}
  <div class="my-5">
    <h5>Tags</h5>

    @foreach ($tags as $tag)
      <div class="form-check form-check-inline">
        {{-- nel velue mettiamo l id pke e' quello che ci arrivera' dal Db cosi ogniuno avra' il suo id  // il name e' importante pke il liguaggio di backend cerca proprio il name e sara' uguale per tutti e scriviamo tags[] in modo da raccoglierli tutti in un unico array --}}
        {{-- nell input tramite attributo booleano  checked ci permetteraà di salvare le box selezionate anche quando il form mostra degli errori di compilazione proprio come fa old()--}}
        <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]" 
        @if (in_array($tag->id, old('tags',[]))) {{---Se in questo array c'e l id di questo checkbox se si metti check se no non metterlo --}}
            checked
        @endif>
        {{--il nome dell id deve essere uguale al for pke nel momento in cui si fa il check sulla scritta del label voglio che si spunti anche il quadratino per questo devono coincidere dato che non possiamo inseire tags pke se no ne avremmo piu di uno uguale allora dobbiamo separarlo    --}}
        <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
      </div>
        
    @endforeach
    
  </div>

  
  <button type="submit" class="btn btn-success">Salva</button>
</form>

