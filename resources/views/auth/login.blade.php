@extends('layout.default', [
    'crumbs' => ['inloggen'],
])

@section('content')

    <div class="text-center">
        <h1 class="text-center">Welkom bij SkillTree! Log in met Github om verder te gaan.</h1>

        <a href="{{ route('auth.login_by_github') }}" class="btn btn-secondary">
            Inloggen met Github
        </a>
    </div>

@endsection
