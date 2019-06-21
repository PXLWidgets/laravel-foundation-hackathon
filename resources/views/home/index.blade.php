@extends('layout.default')

@section('content')

    <div id="homepage">

        <div class="intro">

            <h1>Laravel SkillTree</h1>

            <p>
                Een slimme, snelle meetbare manier om meer developers,
                ervaren of beginnend, kennis te laten maken met het
                Laravel framework en PHP.
            </p>
        </div>

        <br><br>

        <div class="row flex-row align-items-center">
            <div class="col-sm-6 col-lg-4">
                <img src="/images/badges/b1.jpg" alt="">
            </div>

            <div class="col-sm-6 col-lg-4">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>

        <div class="row flex-row align-items-center">

            <div class="col-sm-6 col-lg-4">
                <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>

            <div class="col-sm-6 col-lg-4">
                <img src="/images/badges/b2.jpg" alt="">
            </div>
        </div>

    </div>
@endsection
