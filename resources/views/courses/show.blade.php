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
    <div class="jumbotron">
        <div class="row">
            <div class="col-9">
                <h1 class="display-4">{{ $course->getTitle() }}</h1>
                <p class="lead">{{ $course->getDescription() }}</p>
                <hr class="my-4">
                <p>Totaal aantal vragen: {{ $course->getQuestionCount() }}</p>
                <p>Certificaten te verdienen:</p>
                <ul class="list-unstyled mb-4">
                    @foreach ($course->certificates as $certificate)
                        <li><i class="fas fa-certificate"></i> {{ $certificate->title }}</li>
                    @endforeach
                </ul>
                <hr class="my-4">
                <h3>Resources</h3>
                <ul class="list-unstyled mb-4">
                    @foreach ($course->resources as $resource)
                        <li><a target="_blank" href="{{ $resource->url }}">{{ $resource->title }}</a></li>
                    @endforeach
                </ul>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="{{ route('questions.show', ['id' => $course->questions()->first()->getId()]) }}" role="button">Begin</a>
                </p>
            </div>
            <div class="col-3">
                <img class="w-100 img-fluid card-image-left image"
                     src="{{ $course->getImageUrl() }}"
                     alt="{{ $course->getImageAlt() ?? $course->getTitle() }}">
            </div>
        </div>

    </div>
@endsection
