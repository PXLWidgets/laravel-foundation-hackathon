@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default')

@section('content')
    <div id="course-detail">
        <h1>Course "{{ $course->getTitle() }}" completed!</h1>

        <ul>
            @foreach ($course->getQuestions() as $question)
                <li class="{{ in_array($question->getId(), $wrongQuestions) ? 'failure' : 'success' }}">{{ $question->getContent() }}</li>
            @endforeach
        </ul>

        <a href="{{ $course->getQuestions()->first()->getUrl() }}" class="btn btn-primary">Try this course again</a>

    </div>
@endsection
