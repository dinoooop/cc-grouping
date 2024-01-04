<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head')
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>