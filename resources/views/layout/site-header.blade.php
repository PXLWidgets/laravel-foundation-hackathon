<a class="site-header--title" href="{{ route('homepage') }}">
    Laravel SkillTree
</a>

<nav>
    <ul>
        @guest
            <li>
                <a class="site-header--link" href="{{ route('auth.login') }}">
                    Inloggen
                </a>
            </li>
        @endguest


        @auth
            <li>
                <a class="site-header--link" href="{{ route('courses.index') }}">
                    Cursussen
                </a>
            </li>
            <li>
                <a class="site-header--link" href="{{ route('account.index') }}">
                    Mijn profiel
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
