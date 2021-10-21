
@extends('layouts.app')


@section('content')
    
    <div class="container">
        <h1 class="text-center my-5">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <address>{{ $post->getFormattedDate('created_at') }}</address>
    </div>
@endsection