<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        a:hover{
            color: white;
        }
    </style>
</head>
<body>
    <div id="myContainer" style="background-color: rgb(0, 0, 0); height: 100vh; border-radius: 20px;">
        <img src="/img/medmed.png" style="position: absolute; z-index: 0; width: 20vw; left: 75vw; top: 5vw">
    <div id="app"> 
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style="text-align: center; color: white;">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:white;font-size: 24px;z-index: 1;">
                    <!-- {{ config('MediCharts', 'MediCharts') }} --> Medicharts
                </a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <div id="navbarSupportedContent" style="color:white">
                    <!-- Left Side Of Navbar -->
    

                    <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}" style="color:white; font-size: 22px;">{{ __('Login') }}</a>
                            @endif
                            <span style="color:rgb(0, 0, 0)">    -     </span>
                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;font-size: 22px;">{{ __('Register') }}</a>
                            @endif
                        @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   User: {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
                </div>
            </div>
        </nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
</body>
</html>
