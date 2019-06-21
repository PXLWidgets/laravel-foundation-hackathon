<a class="site-header--title" href="{{ route('homepage') }}">
    Laravel SkillTree
</a>

<nav>
    <ul>
        <li>
            <a class="site-header--link" href="{{ route('courses.index') }}">
                Courses
            </a>
        </li>

        <li>
            <a class="site-header--link" href="{{ route('account.index') }}">
                Account
            </a>
        </li>

        @auth
            <li>
                <a class="site-header--link" href="{{ route('auth.logout') }}">
                    Uitloggen
                </a>
            </li>
        @endauth
    </ul>
</nav>
