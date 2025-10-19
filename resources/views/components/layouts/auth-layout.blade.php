<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? $title . ' - BSU' : 'BSU' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('img/BSU_BOKOD_LOGO.png') }}">
    <script src="https://kit.fontawesome.com/c9218d1145.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>
        {{ config('app.name', 'BSU Portal') }} - {{ $title ?? 'Authentication' }}
    </title>
</head>

<body>
    <nav class="bg-bsu-green">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
            <a class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="img/BSU_BOKOD_LOGO.png" class="h-15" alt="BSU Bokod Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BSU Bokod
                    Portal</span>
            </a>
            <div class="md:block hidden">
                <!-- Login Button -->
                <button onclick="window.location='{{ route('login') }}'"
                    @if (request()->is('login')) disabled @endif
                    class="py-2 px-4 rounded-s-full text-white {{ request()->is('login') ? 'bg-bsu-yellow' : 'bg-bsu-light-yellow hover:bg-bsu-yellow cursor-pointer hover:scale-110 duration-300' }}">
                    Login
                </button>

                <!-- Register Button -->
                <button onclick="window.location='{{ route('register') }}'"
                    @if (request()->is('register')) disabled @endif
                    class="py-2 px-4 rounded-e-full text-white {{ request()->is('register') ? 'bg-bsu-yellow' : 'bg-bsu-light-yellow hover:bg-bsu-yellow cursor-pointer hover:scale-110 duration-300' }}">
                    Register
                </button>
            </div>

        </div>
    </nav>

    <div class="h-screen bg-portal flex items-center justify-center">
        {{ $slot }}
    </div>

    <footer>
        <div class="text-center p-4 bg-bsu-green text-white">
            © 2025 Benguet State University Bokod Campus. All rights reserved.
        </div>
    </footer>

</body>

</html>
