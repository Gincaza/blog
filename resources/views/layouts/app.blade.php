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
           <a class="{{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Sobre</a>
           <a class="{{ Request::routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">Posts</a>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

