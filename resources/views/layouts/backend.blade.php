<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title')</title>
</head>
<body>
    <nav>Menu de navigation</nav>
    <main>
        @yield('content')
    </main>

    @stack('script_backend')

</body>
</html>
