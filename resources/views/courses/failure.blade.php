@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default')

@section('content')
    <div class="jumbotron">
        <h3 class="mb-4">Helaasch!
            {{ $course->getTitle() }} mislukt!</h3>

        <ul class="list-unstyled">
            @foreach ($course->getQuestions() as $question)
                <li class="mb-2 {{ in_array($question->getId(), $wrongQuestions) ? 'text-danger' : 'text-success' }}">
                    {{ $question->getContent() }}
                </li>
            @endforeach
        </ul>


        <a href="{{ route('courses.index') }}" class="btn btn-primary">Weer terug naar de lijst</a>

    </div>
@endsection
