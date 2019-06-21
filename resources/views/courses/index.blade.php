@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface[] $courses
     */

@endphp

@extends('layout.default', [
    'crumbs' => ['courses'],
])

@section('content')
    <div id="courses-index">
        <h1>Courses</h1>

        @forelse($courses as $course)


            @include('partials.course-block', compact('course'))
        @empty
            No courses to show.
        @endforelse
    </div>
@endsection
