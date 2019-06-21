@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default')

@section('content')
    <div id="course-detail">
        <h1>Course {{ $course->getTitle() }} failed</h1>

        <ul>
            @foreach ($course->getQuestions() as $question)
                <li class="{{ in_array($question->getId(), $wrongQuestions) ? 'failure' : 'success' }}">{{ $question->getContent() }}</li>

            @endforeach
        </ul>

    </div>
@endsection
