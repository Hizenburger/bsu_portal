<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>{{ isset($title) ? $title . ' - BSU' : 'BSU' }}</title> --}}
    <title>@yield('title', 'BSU')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/BSU_BOKOD_LOGO.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-200">
    <div class="relative min-h-screen md:flex ">
        <!-- sidebar -->
        @include('components.sidebar')
        <!-- Main Content -->
        <main class="w-screen">
            <nav class="bg-bsu-green shadow-lg h-15">
                {{-- nav content --}}
            </nav>
            {{-- Page Content --}}
            <div>
                @yield('content')
            </div>
        </main>
    </div>

    <footer>
        <div class="text-center p-4 bg-bsu-green text-white">
            © 2025 Benguet State University Bokod Campus. All rights reserved.
        </div>
    </footer>

</body>

</html>
