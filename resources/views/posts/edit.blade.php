@extends('layouts.app')

@section('title', 'Update'. $post->title)

@section('content')

    @includeWhen($errors->any(), '_error')

    @if (session('success'))
    <div class="flash-success">
        {{ session('success') }}
    </div>      
    @endif
    
    <h1>Update {{ $post->title }}</h1>
    
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
            <div class="error">{{ $message }}</div>            
        @enderror

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Update</button>
    </form>
@endsection
