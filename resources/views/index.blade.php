@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @forelse ($posts as $post)
        <div class="post-item">
            <div class="post-content">
                <h2><a href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->description }}</p>
                <small>Posted by <b>{{ $post->user->name }}</b></small>
            </div>
        </div>

    @empty
        <h1>There are no posts</h1>
    @endforelse
@endsection
