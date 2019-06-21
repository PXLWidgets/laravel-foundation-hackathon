<ul class="badges-list">
    @foreach ($badges as $badge)
        @php
            /** @var \App\User $user */
            $isEarned = $user->badges->contains(function (\App\Badge $b) use ($badge) {
                return $b->id === $badge->id;
            })
        @endphp
        <li>
            <img alt="{{$badge->title}}" src="{{ str_replace('localhost', 'localhost:8011', $badge->image->url()) }}" class="@unless($isEarned) grey @endunless img-fluid"/>
        </li>
    @endforeach
</ul>
