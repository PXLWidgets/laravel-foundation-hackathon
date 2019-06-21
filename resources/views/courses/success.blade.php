@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default')

@section('content')
    <div class="jumbotron">
        <h3 class="mb-4">GEFELICITEERD!
            {{ $course->getTitle() }} geslaagd! 🎉</h3>
        <ul class="list-unstyled">
            @foreach ($course->getQuestions() as $question)
                <li class="success">
                    <i class="fas fa-check"></i>
                    {{ $question->getContent() }}
                </li>
            @endforeach
        </ul>

        <a href="{{ route('courses.index') }}" class="btn btn-primary">Weer terug naar de lijst</a>

    </div>
@endsection
