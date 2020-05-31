<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php($resource_path = asset('images'))
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="resource_path" content="{{ $resource_path }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-lancer-light bodyClass">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                   {{-- {{ config('app.name', 'Lancer') }}--}}
                    <img src="{{asset('/images/lancers_logo.png')}}" width="auto" height="30" alt="" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item home-navs">
                                <router-link to="/home" class="nav-link text-dark">
                                    Dashboard
                                </router-link>
                            </li>
                            <browse></browse>
                            <my-project></my-project>
                            <messages></messages>
                            <update></update>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark text-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else



                           {{-- <form action="#" class="d-none d-sm-block ml-4">
                                <div class="input-group search-box">
                                    <input type="text" class="form-control lancer-search" placeholder="Search…">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text text-lancer-dark">
                                        <i class="mdi mdi mdi-magnify text-lancer-dark"></i>
                                      </span>
                                    </div>
                                </div>
                            </form>--}}

                            <li class="nav-item dropdown ml-2">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="img-bordered-sm img-sm rounded-circle" src="{{auth()->user()->userable->image_path}}" alt="Profile image">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="navbarDropdown">
                                    <ul>
                                            <li class="nav-item text-center text-dark">
                                                <a href="{{url('/profile')}}" class="dropdown-item nav-item">
                                                    <p>Profile</p>
                                                </a>
                                            </li>
                                            <li class="nav-item text-center text-dark">
                                                <a href="#" class="dropdown-item nav-item">
                                                    <p>User Settings</p>
                                                </a>
                                            </li>

                                        <li class="nav-item text-center text-dark">
                                            <a href="#" class="dropdown-item nav-item">
                                                <p>Get Support</p>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="dropdown-item text-center nav-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

        <footer class="bg-lancer p-4 text-center">
            <div class="container-fluid ml-4 mr-3 mt-3 mb-3">
                <div class="row mt-3 mb-3">
                    <div class="col-md-2">
                        <p></p>
                        <img src="{{asset('/images/lancers_logo_inverted.png')}}" width="auto" height="30" alt="" loading="lazy">
                        <p class="text-white">@Lancers {{date('Y')}}</p>
                    </div>
                    <div class="col-md-2 text-white">
                        <p>About Us</p>
                        <p>Contact Us</p>
                        <p>Terms & Conditions</p>
                    </div>
                    <div class="col-md-2 text-white">
                        <p><span class="fab fa-facebook"></span>&nbsp;  Facebook</p>
                        <p><span class="fab fa-twitter"></span>&nbsp;  Twitter</p>
                        <p><span class="fab fa-instagram"></span>&nbsp;  Instagram</p>
                    </div>
                    <div class="col-md-2">
                        <contact-us></contact-us>
                    </div>
                    <div class="col-md-1 text-white"></div>
                    <div class="col-md-3 text-white">
                        <p>SSNIT House, Ama Atta Akroma Rd.</p>
                        <p>+233 244556677</p>
                        <p>lancers@mail.com</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
