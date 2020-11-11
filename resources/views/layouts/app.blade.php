<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Stand') }} | @yield('title', 'Home')</title>

    <meta name="description" content="@yield('description', 'Home')">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home', app()->getLocale()) }}">
                {{ config('app.name', 'Stand') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    @foreach(config('app.locales') as $locale => $lang)
                        <li class="nav-item mx-1 my-2">
                            <a class="btn btn-sm {{ app()->isLocale($locale) ? 'btn-secondary' : 'btn-outline-secondary' }}"
                               href="{{ route(Route::currentRouteName(), [$locale, $id ?? '']) }}"
                               title="{{ __('language.' . $locale) }}">{{ $lang }}</a>
                        </li>
                    @endforeach

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right border-0 shadow text-right"
                                 aria-labelledby="navbarDropdown">

                                <h6 class="dropdown-header">{{ __('adminpanel.user.menu-title') }}</h6>

                                <div class="btn-group mt-2 mb-3 mx-4" role="group" aria-label="Basic example">

                                    @if (Auth::user()->isAdmin())
                                        <a role="button" class="btn btn-outline-dark"
                                           href="{{ route('admin.dashboard.index', app()->getLocale()) }}"
                                           title="{{ __('adminpanel.admin.title') }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if (Auth::user()->isAdmin() || Auth::user()->isUser())
                                        <a role="button" class="btn btn-dark"
                                           href="{{ route('home', app()->getLocale()) }}"
                                           title="{{ __('adminpanel.user.title') }}">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    <a role="button" class="btn btn-secondary"
                                       href="{{ route('logout', app()->getLocale()) }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('auth.logout') }}
                                    </a>
                                </div>

                                <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        @yield('content')

    </main>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
