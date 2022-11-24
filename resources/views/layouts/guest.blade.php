<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sari Roti</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- My Style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @if (!Route::is('register') && !Route::is('login'))
        @include('layouts.navigation')
    @endif
    {{ $slot }}
    @include('layouts.footer')

    @include('sweetalert::alert')
    <script>
        const mouseWheel = document.querySelector('.scrolling-wrapper');

        // Add wheel function
        mouseWheel.addEventListener('wheel', function(e) {

            const race = 30; // <= set scroll mouse move the wheels

            if (e.deltaY > 0) // <= Scroll right
                mouseWheel.scrollLeft += race;
            else // Scroll left
                mouseWheel.scrollLeft -= race;
            e.preventDefault();
        });
    </script>
</body>

</html>
