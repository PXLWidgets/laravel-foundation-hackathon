@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

<article class="course-block @if ($course->parent_id !== null && $course->isCompletedByUser() === false)
    disabled
@endif">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <img class="img-fluid card-image-left image"
                         src="{{ $course->getImageUrl() }}"
                         alt="{{ $course->getImageAlt() ?? $course->getTitle() }}">
                </div>
                <div class="col-9">
                    <h5 class="card-title">{{ $course->getTitle() }}</h5>
                    <p class="card-text">{{ $course->getDescription() }}</p>
                    <a href="{{ $course->getPageUrl() }}" class="btn btn-primary @if ($course->parent_id !== null && $course->isCompletedByUser() === false)
                        disabled
@endif">Doe de cursus</a>
                </div>
            </div>
            @if ($course->parent_id !== null && $course->isCompletedByUser() === false)
                SLOT
            @endif
        </div>
    </div>
</article>
