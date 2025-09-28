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
            <div>
                <!-- Logout Button -->
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-ghost btn-sm">Logout</button>
                </form>
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
