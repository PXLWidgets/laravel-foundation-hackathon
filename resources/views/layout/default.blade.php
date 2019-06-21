@php

    /**
     * @var array $crumbs
     */

    $crumbs = $crumbs ?? [];
@endphp


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<body>

<header class="site-header">
    <div class="container">
        <div class="site-header--content">
            @include('layout.site-header')
        </div>
    </div>
</header>

    <div class="container">

        @if( Session::has('success'))
            <div class="notification success">
                {{ Session::get( 'success' ) }}
            </div>
        @elseif( Session::has('warning'))
            <div class="notification warning">
                {{ Session::get('warning') }}
            </div>
        @elseif( Session::has('danger'))
            <div class="notification danger">
                {{ Session::get('danger') }}
            </div>
        @endif

        <ul class="breadcrumbs">
            <li>Home</li>
            @foreach($crumbs as $crumb)
                > <li>{{ $crumb }}</li>
            @endforeach
        </ul>
    </div>

    <main id="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('layout.site-footer')

<script src="{{ mix('js/app.js')}}"></script>
@stack('scripts')

</body>
