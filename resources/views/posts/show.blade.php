@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class='post-item'>
    <div class='post-content'>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
    </div>
</div>
@endsection