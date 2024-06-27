@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

    @if ($errors->any())
    <div class="flash-error">
        <b>There are some erros in your submission:</b>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if (session('success'))
    <div class="flash-success">
        {{ session('success') }}
    </div>      
    @endif
    
    <h1>Create Post</h1>
    
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
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

        <button type="submit">Submit</button>
    </form>
@endsection
