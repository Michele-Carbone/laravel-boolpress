
@extends('layouts.app')


@section('content')
    
    <div class="container">
        
        <h1 class="text-center my-5">{{ $category->name }}</h1>
        <p>Colore: {{ $category->color }}</p>

        <div class="d-flex justify-content-between my-5">
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning ml-2">Modifica</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="delete-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                        </form>
            <a href="{{route('admin.categories.index')}}" class="btn btn-success">Torna indietro</a>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/confirm-delete.js')}}"></script>
@endsection
