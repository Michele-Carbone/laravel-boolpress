
@extends('layouts.app')


@section('content')
    
    <div class="container">
        
        <h1 class="text-center my-5">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at') }}</address>

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
