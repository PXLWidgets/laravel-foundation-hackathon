<a class="site-header--title" href="{{ route('homepage') }}">
    Laravel SkillTree
</a>

<nav>
    <ul>
        @guest
            <li>
                <a class="site-header--link" href="{{ route('auth.login_by_github') }}">
                    Login
                </a>
            </li>
        @endguest


        @auth
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
            <li>
                <a class="site-header--link" href="{{ route('auth.logout') }}">
                    Uitloggen
                </a>
            </li>
        @endauth
    </ul>
</nav>
