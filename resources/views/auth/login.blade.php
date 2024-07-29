@extends('layouts.app')

@section('name', 'Login')
    
@section('content')

    @includeWhen($errors->any(), '_error')

    @if (session('success'))
    <div class="flash-success">
        {{ session('success') }}
    </div>      
    @endif

    <h1>Login</h1>

    <form action="{{ route('login') }}" method="post">
        @csrf

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

        <button type="submit">Login</button>

        If you don't have an account, <a href="{{ route('register') }}">register</a>.
    </form>
@endsection
