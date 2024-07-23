@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class='post-item'>
    <div class='post-content'>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="delete-button" type="submit">Delete</button>
        </form>
        <small>Posted by <b>{{ $post->user->name }}</b></small>
    </div>
</div>
@endsection