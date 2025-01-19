@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Category: {{ $post->category }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ route('reading') }}" class="btn btn-secondary">Back to Knowledge Area</a>
    </div>
@endsection
