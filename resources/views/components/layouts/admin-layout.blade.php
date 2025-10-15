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

</head>

<body>
    <div class="relative min-h-screen md:flex">
        <!-- sidebar -->
        <aside id="sidebar"
            class="z-10 bg-bsu-green text-white w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative transform -translate-x-full md:translate-x-0 overflow-y-auto transition ease-in-out duration-200 shadow-lg">
            <!--logo-->
            <div class="flex items-center justify-between px-2">
                <div class="flex items-center gap-2">
                    <a href="">
                        <img src="{{ asset('img/BSU_BOKOD_LOGO.png') }}" class="block h-10 w-auto fill-current"
                            alt="BSU Logo" />
                    </a>
                    <span class="2xl font-extrabold">Admin</span>
                </div>
                <button id="closeSidebar" type="button"
                    class="inline-flex p-2 justify-center items-center rounded-md bg-white text-red-500 hover:text-white hover:bg-red-500 focus:outline-none cursor-pointer">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!--navigation links-->
            <nav>

            </nav>
        </aside>
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
                        <div>
                            <!-- Logout Button -->
                            <form method="POST" action="/logout" class="inline">
                                @csrf
                                <button type="submit"
                                    class="bg-bsu-light-yellow hover:bg-bsu-yellow cursor-pointer hover:text-white hover:scale-110 duration-300 px-4 py-2 rounded-full">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <div>
                {{ $slot }}
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
