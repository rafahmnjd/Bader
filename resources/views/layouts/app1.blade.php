<!doctype html>
<html dir="{{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'rtl' : 'ltr' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>



        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/zmdi.css') }}" rel="stylesheet">

        @yield('style')

        @if (app()->getLocale() == 'ar')
        <style>
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p,
            label,
            div {
                text-align: right;
            }
        </style>
        @endif

    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm mb-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('about') }}">{{ config('app.name', 'Laravel') }}</a>
                    <div class="navbar-collapse collapse show" id="navbarColor01">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav @if (app()->getLocale() == 'ar') ml-auto
                    text-right @else mr-auto @endif">
                            <a class="nav-link" href="{{ route('base') }}">{{ __('Home') }}</a>
                            @yield('left_nav')
                            @if (App::isLocale('en'))
                            <a class="nav-link" href="{{ route('lang', 'ar') }}">{{ __('Ar') }}</a>
                            @else
                            <a class="nav-link" href="{{ route('lang', 'en') }}">{{ __('En') }}</a>
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav @if(app()->getLocale() == 'ar') mr-auto text-right @else ml-auto @endif">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class=""></span>
                                    @can('charity')
                                    @if (!empty(Auth::user()->charity->logo))
                                    <img src="{{ asset(config('path.ch_logo') . Auth::user()->charity->logo) }}"
                                        width="30" height="30" alt="">
                                    @else
                                    <img src="{{ asset(config('path.default')) }}" width="30" height="30" alt="">
                                    @endif
                                    @else
                                    <img src="{{ asset(config('path.default')) }}" width="30" height="30" alt="">
                                    @endcan
                                </a>
                                <div class="dropdown-menu @if (app()->getLocale() == 'ar') dropdown-menu-left text-right @else dropdown-menu-right @endif "
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    @can('charity')
                                    <a class="dropdown-item" href="{{ route('charities.create') }}">
                                        {{ __('Manage my charity') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('jobs.index') }}">
                                        {{ __('Manage Jobs') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('projects.index') }}">
                                        {{ __('Manage Projects') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('shortages.index') }}">
                                        {{ __('Manage Shortages') }}
                                    </a>
                                    @elsecan('admin')
                                    <a class="dropdown-item" href="{{ route('charities.index') }}">
                                        {{ __('Manage Charities') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('items.index') }}">
                                        {{ __('Manage Items') }}
                                    </a>
                                    @endcan
                                    {{-- <a class="dropdown-item" href="{{route('profile.show')}}">
                                    {{__('Profile_pic')}}
                                    </a> --}}
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- <main class="container-fluid"> --}}
            <main class="container-fluid">
                @yield('content')
            </main>
        </div>
    </body>


    <!-- Scripts -->

{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    @yield('script')
