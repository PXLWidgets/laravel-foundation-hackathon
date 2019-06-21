@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default')

@section('content')
    <div id="course-detail">
        <h1>Course "{{ $course->getTitle() }}" failed</h1>

        <ul>
            @foreach ($course->getQuestions() as $question)
                <li class="success">{{ $question->getContent() }}</li>
            @endforeach
        </ul>

        <a href="{{ route('courses.index') }}" class="btn btn-primary">To the courses overview</a>

    </div>
@endsection
