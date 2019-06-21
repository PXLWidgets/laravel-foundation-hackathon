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


        @forelse($courses as $courseLevel)
            <div class="row row--courses">
                @foreach ($courseLevel as $course)
                    <div class="mx-auto mb-4 col-lg-{{$maxWidth}}">
                        @include('partials.course-block', compact('course'))
                    </div>
                @endforeach
            </div>
        @empty
            No courses to show.
        @endforelse
    </div>

@endsection
