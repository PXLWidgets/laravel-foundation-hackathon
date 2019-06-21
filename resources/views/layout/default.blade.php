<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<body>

    <header class="site-header">
        <nav>
            <ul>
                <li>
                    <a href="{{ route('homepage') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('account.index') }}">
                        Account
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main id="main-content" class="container">
        Content:
        <br>
        -------
        @yield('content')
    </main>

    <footer class="site-footer">
        Site footer:
        -----------
    </footer>
</body>
