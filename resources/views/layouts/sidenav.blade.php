<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head')
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>
    <div class="container">
        <aside class="sidenav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/admin/groups">Groups</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>

        </aside>

        <main>
            <div class="main">

                @yield('content')

            </div>
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>