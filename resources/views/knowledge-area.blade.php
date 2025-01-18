@extends('layout.app')

@section('content')
    <h1>Knowledge Area</h1>
    @foreach ($posts as $post)
        <div>
            <h2><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h2>
            <p>{{ Str::limit($post->content, 150) }}</p>
        </div>
    @endforeach
@endsection
