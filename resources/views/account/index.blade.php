@php

    /**
     * @var \App\User $user
     */

@endphp


@extends('layout.default', [
    'crumbs' => ['account', 'dashboard'],
])

@section('content')
    <div id="account-index">


        <header>
            <div class="avatar">
                <img src="{{ $user->avatar_url }}" alt="">
            </div>

            <div class="intro">

                <div class="intro--top">
                    <h1>{{ $user->name }}</h1>
                    <p>Hackin' and crackin 🎉</p>
                </div>

                <div class="intro--bottom">
                    <ul class="certificates-list">
                        @foreach ($user->certificates as $certificate)
                        <li>{{ $certificate->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </header>

        <section class="badges-section">
            <h2>Behaalde badges</h2>

            @include('partials.badges-list')
        </section>
    </div>
@endsection
