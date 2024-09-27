<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="bg-white shadow">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between py-4">
                    <a class="text-lg font-bold" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    {{-- <button class="p-2 md:hidden focus:outline-none" type="button" onclick="document.getElementById('navbarSupportedContent').classList.toggle('hidden')" aria-label="{{ __('Toggle navigation') }}">
                        <span class="block w-6 h-0.5 bg-gray-700 mb-1"></span>
                        <span class="block w-6 h-0.5 bg-gray-700 mb-1"></span>
                        <span class="block w-6 h-0.5 bg-gray-700"></span>
                    </button> --}}

                    <div class="hidden md:flex md:items-center" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="flex space-x-4">
                            <!-- Add left side links here -->
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="flex ml-auto space-x-4">
                            <!-- Authentication Links -->
                            {{-- @guest
                                @if (Route::has('login'))
                                    <li>
                                        <a class="text-gray-700 hover:text-blue-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li>
                                        <a class="text-gray-700 hover:text-blue-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else --}}
                            <li class="relative mr-4 cursor-pointer">
                                <x-heroicon-o-bell-snooze class="w-[35px]" />
                                <div class="absolute -top-[2px] -right-[2px] text-white bg-red-600 rounded-full text-[12px] w-[18px] text-center aspect-square"> 1</div>
                            </li>
                            <li class="relative group">
                                <a  class="cursor-pointer py-4text-gray-700 hover:text-blue-500">
                                    <span  class="flex gap-1 w-[100px]">
                                        <x-heroicon-s-user class="bg-black text-gray-50 w-[32px] aspect-square" /> <x-heroicon-o-chevron-right class="rotate-90  w-[24px]" />
                                    </span>
                                    
                                </a>
                            
                                <div class="absolute right-0 z-10 hidden w-48 bg-white border border-gray-400 rounded shadow-lg top-full group-hover:block" >
                                    <div class="relative py-2 text-center border-b-2">
                                        <div class="absolute -top-[7px] right-4 rotate-45 w-[12px] aspect-square border-t border-l border-gray-400  bg-white" ></div>
                                        <span>{{ Auth::user()->name }}</span>
                                    </div>
                                    <a class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50">
                                        <span>
                                            Настройки
                                        </span>
                                    </a>
                                    <a class="block px-4 py-2 text-sm text-gray-700 no-underline cursor-pointer hover:bg-gray-50" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Выход
                                    </a>
                            
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            {{-- @endguest --}}
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <svg hidden class="hidden">
        @stack('bladeicons')
    </svg>
</body>
</html>

