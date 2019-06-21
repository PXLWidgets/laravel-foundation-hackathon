@php

    /**
     * @var
     */

@endphp


@extends('layout.default')

@section('content')
    <div id="account-index">

        <header>
            <div class="avatar">
                <img src="https://i.stack.imgur.com/WknC7.jpg?s=328&g=1" alt="">
            </div>

            <div class="intro">

                <div class="intro--top">
                    <h1>Jeffrey Westerkamp</h1>
                    <p>Hackin' and crackin 🎉</p>
                </div>

                <div class="intro--bottom">
                    <ul class="certificates-list">
                        <li>Cert one</li>
                        <li>Cert two</li>
                        <li>Cert three</li>
                    </ul>
                </div>
            </div>
        </header>

        <section class="badges-section">
            <h2>My badges</h2>

            @include('partials.badges-list')
        </section>
    </div>
@endsection
