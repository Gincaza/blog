@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <h1>Create Post</h1>
    
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>

        <button type="submit">Submit</button>
    </form>
@endsection
