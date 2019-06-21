<ul class="badges-list">
    @foreach ($badges as $badge)
        <li>
            <img alt="{{$badge->title}}" src="{{ str_replace('localhost', 'localhost:8011', $badge->image->url()) }}" class="grey img-fluid"/>
        </li>
    @endforeach
</ul>
