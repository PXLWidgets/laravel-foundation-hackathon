@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

]
<article class="course-block">

    <header>
        <img class="image"
             src="{{ $course->getImageUrl() }}"
             alt="{{ $course->getImageAlt() ?? $course->getTitle() }}">

        <h1>{{ $course->getTitle() }}</h1>
    </header>

    <h2>Resources</h2>

    <ul>
        @foreach($course->getResources() as $resource)
            <li>
                <a href="{{ $resource->url() }}">
                    {{ $resource->label() ?? $resource->url() }}
                </a>
            </li>
        @endforeach
    </ul>

</article>
