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
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="relative min-h-screen md:flex">
        <!-- sidebar -->
        @include('components.sidebar')
        <!-- Main Content -->
        <main class="w-screen">
            <nav class="bg-bsu-green shadow-lg">
                <div class="mx-auto px-2 sm:px-6 lg:px-8">
                    <div class="relative flex items-center justify-between md:justify-end h-16">
                        <div class="absolute inset-y-0 left-0 flex items-center">
                            <button id="openSidebar" type="button"
                                class="inline-flex items-center justify-center p-2 rounded cursor-pointer hover:bg-green-200">
                                <i class="fa-solid fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
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
