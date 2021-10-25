@extends('layouts.app')


@section('content')
    
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    
                </ul>
                
            </div>
        @endif
        <header class="d-flex justify-content-between align-items-center">
            <h1>Crea Nuova Categoria</h1>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-success">Indietro</a>
        </header>

        <section id="form">
            @include('includes.admin.categories.form')
        </section>
    </div>
@endsection
