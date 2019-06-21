@php

    /**
     * @var \App\Contracts\ViewModels\CourseInterface $course
     */

@endphp

]
<article class="course-block">

    <header>
        <img class="image"
             src="{{ $course->imageUrl() }}"
             alt="{{ $course->imageAlt() ?? $course->title() }}">

        <h1>{{ $course->title() }}</h1>
    </header>

    <h2>Resources</h2>

    <ul>
        @foreach($course->resources() as $resource)
            <li>
                <a href="{{ $resource->url() }}">
                    {{ $resource->label() ?? $resource->url() }}
                </a>
            </li>
        @endforeach
    </ul>

</article>
