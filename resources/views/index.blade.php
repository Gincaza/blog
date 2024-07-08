@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @forelse ($posts as $post)
        <div class="post-item">
            <div class="post-content">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
            </div>
        </div>

    @empty
        <h1>There are no posts</h1>
    @endforelse
@endsection
