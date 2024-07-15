<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
           <a class="{{ Request::routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
           <a class="{{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
           @auth
           <a class="{{ Request::routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">Posts</a>
           <a class="{{ Request::routeIs('logout') ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a>
           <p class="user-info">Logged in as <b>{{ Auth::user()->name }}</b></p>
           @else
           <a href="{{ route('login') }}">Login</a>
           @endauth
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

