<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Skill-Forge.Study</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app" class="app">
            <header class="header">
                <div class="header__logo logo">Skill Forge</div>
                <nav class="header__nav top-nav">
                    <ul class="top-nav__list">
                    @guest
                        <li class="top-nav__el"><a href="{{ route('login') }}">Login</a></li>
                        <li class="top-nav__el"><a href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth
                        <li class="top-nav__el"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="top-nav__el">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>
                    @endauth
                    </ul>
                </nav>
            </header>
            <main class="main"></main>
            <footer class="footer">
                <div class="footer__copy copy">
                    &copy; 2022—@php(print(date('Y'))) skill-forge.study. Licence <a href="https://creativecommons.org/licenses/by/4.0/" target="_blank">Creative Commons Attribution 4.0 International (CC BY 4.0)</a>
                </div>
            </footer>
        </div>
    </body>
</html>
