<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <header>
        @yield('header')
    </header>

    @auth
        <div class="container mx-auto" id="app">
            @yield('content')
        </div>
    @else
    @endauth
</body>
</html>
