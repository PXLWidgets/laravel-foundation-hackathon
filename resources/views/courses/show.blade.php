@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

@extends('layout.default', [
    'crumbs' => [
        'courses',
        $course->getTitle(),
    ]
])

@section('content')
    <div id="course-detail">
        <h1>{{ $course->getTitle() }}</h1>
        <p>{{ $course->getDescription() }}</p>
    </div>
@endsection
