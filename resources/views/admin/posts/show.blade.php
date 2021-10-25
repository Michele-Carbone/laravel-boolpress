
@extends('layouts.app')


@section('content')
    
    <div class="container">
        
        <h1 class="text-center my-5">{{ $post->title }}</h1>
        {{-- Creare un post con una categoria ha portato a un problema nei posts gia' esistenti pke quando vogliamo modificarli ci da errore pke non hanno una sezione categoria,
        quindi per risolvere questo problema basta creare un @if in modo che se hanno una categoria prendi quella seleziona ma se non hanno una categoria allora stampa che non hanno una categoria--}}
        <h4>Categoria: @if ($post->category) {{ $post->category->name }}  @else Nessuna Categoria  @endif </h4>
        <p>{{ $post->content }}</p>
        <address>Pubblicato il:{{ $post->getFormattedDate('created_at') }}</address>
        

        <div class="d-flex justify-content-between my-5">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning ml-2">Modifica</a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class="delete-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                        </form>
            <a href="{{route('admin.posts.index')}}" class="btn btn-success">Torna indietro</a>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/confirm-delete.js')}}"></script>
@endsection
