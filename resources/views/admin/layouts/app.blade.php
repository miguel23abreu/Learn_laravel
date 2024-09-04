<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Especializa TI</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- forma de utilizar os resources usando o vite -->
</head>
<body>
    <header>
        header default 2
    </header>
        @yield('content')
    <footer>
        footer default 2
    </footer>
</body>
</html>