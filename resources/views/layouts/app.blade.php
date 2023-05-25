<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>
<body class="font-sans antialiased min-h-screen grid grid-rows-[auto_1fr_auto]">
<header class="top-0 z-50 bg-white border-b border-gray-200">
    <nav class="border-gray-200 bg-gray-50">
        <div class="container flex flex-wrap items-center justify-between mx-auto p-4 relative">
            <ul class="flex font-medium mt-0 rounded-lg bg-gray-50 md:space-x-8 md:border-0 md:bg-transparent">
                <li>
                    <a href="{{ url('/') }}"
                       class="block pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:py-2 md:p-0"
                       aria-current="page">Главная</a>
                </li>
                <li>
                    <a href="{{ url('/works') }}"
                       class="block pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:py-2 md:p-0">Работы</a>
                </li>
            </ul>
            <button data-collapse-toggle="navbar-solid-bg" type="button"
                    class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-solid-bg" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div
                class="hidden w-full absolute top-full left-0 bg-gray-50 pr-4 pb-4 md:block md:w-auto md:static md:pb-0"
                id="navbar-solid-bg">
                <div class="flex flex-col md:items-end md:flex-row">
                    @if(backpack_auth()->check())
                        <a href="{{ backpack_middleware() }}"
                           class="ml-4 text-gray-900 pl-3 md:text-sm md:text-gray-700 md:underline">Админ панель</a>
                        <form method="POST" action="{{ backpack_url('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="ml-4 text-gray-900 pt-2 pl-3 md:text-sm md:text-gray-700 md:underline md:pt-0">Выйти
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="container mx-auto">
    @yield('content')
</main>
<footer
    class="p-4 bg-white border-t border-gray-200 shadow md:p-6">
    <div class="container mx-auto md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center">© 2023 <a href="/"
                                                                     class="hover:underline">CV - Yana Kurenko™</a>. All Rights Reserved.
    </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0 gap-6">
            <li>
                <a href="https://www.facebook.com/jana.bee.98" class="block py-2 pl-3 pr-4 rounded hover:text-blue-700 md:p-0">
                    Facebook
                </a>
            </li>
            <li>
                <a href="mailto:jana.kurenko@ivkhk.ee" class="block py-2 pl-3 pr-4 rounded hover:text-blue-700 md:p-0">
                    Email
                </a>
            </li>
            <li>
                <a href="{{ url('/ask') }}"
                   class="block py-2 pl-3 pr-4 underline decoration-sky-500 decoration-2 underline-offset-8 text-gray-900 md:hover:text-blue-700 md:p-0">Связаться
                    со мной</a>
            </li>
        </ul>
    </div>
</footer>
</body>
</html>
