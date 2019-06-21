<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<body>

    <header class="site-header">
        <div class="container">
            @include('layout.site-header')
        </div>
    </header>

    <main id="main-content" class="container">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            @include('layout.site-footer')
        </div>

    </footer>
</body>
