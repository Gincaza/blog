@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h1>Register</h1>

<form action="{{ route('register') }}" method="post">
    @csrf

    <label for="name">Name</label>
    <input class="@error('name') error-border @enderror" type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="email">Email</label>
    <input class="@error('email') error-border @enderror" type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="password">Password</label>
    <input class="@error('password') error-border @enderror" type="password" name="password">
    @error('password')
        <div class="error">{{ $message }}</div>
    @enderror

    If you already have an account, <a href="{{ route('login') }}">login</a>.
</form>
@endsection