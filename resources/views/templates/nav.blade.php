<header class="header">
    <nav class="navbar">
        <div class="logo topnav">
            <a href="{{ url('/') }}">CC GROUPING</a>
        </div>
        <div class="topnav">
            <a href="{{ url('/countries') }}">Countries</a>
            <a href="{{ url('/cities') }}">Cities</a>
            @auth
            <a href="{{ url('/admin/groups') }}">Groups</a>
            <a href="{{ url('/logout') }}">Logout</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endauth
        </div>
    </nav>
</header>