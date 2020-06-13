<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php($resource_path = asset('images'))
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="resource_path" content="{{ $resource_path }}">

    @auth
        <meta name="user-id" content="{{ Auth::user()->id }}">
        <meta name="auth_user" content="{{ Auth::user()->userable }}">
        <meta name="status" content="{{ Auth::user()->active }}">
        <meta name="pro-update" content="{{ Auth::user()->profile_updated }}">
    @else
        <meta name="user-id" content="0">
        <meta name="auth_user" content="0">
        <meta name="status" content="0">
        <meta name="pro-update" content="2">
    @endauth

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body class="bg-lancer-light">
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
                                   <a href="{{route('home')}}" class="nav-link text-dark">
                                       <i class="fas fa-tachometer-alt text-dark h4"></i>
                                       Dashboard
                                   </a>
                               </li>

                               <browse></browse>
                              @if(auth()->user()->role->name !== 'admin')
                                   <li class="nav-item home-navs">
                                       <a href="{{route('browse-post-job')}}" class="nav-link text-dark">
                                           <i class="fas fa-tv text-dark h4"></i> My Project
                                       </a>
                                   </li>
                               @endif
                               <li class="nav-item home-navs">
                                   <a href="{{route('chat.index')}}" class="nav-link text-dark">
                                       <i class="fas fa-comments text-dark h4"></i> Messages
                                   </a>
                               </li>
                               {{--<update></update>--}}
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
                                       <img class="img-bordered-sm img-sm rounded-circle mr-2" src="{{auth()->user()->userable->image_path}}" alt="Profile image">
                                       <span>{{auth()->user()->userable->full_name}}</span>
                                   </a>

                                   <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="navbarDropdown">
                                       <ul class="text-dark text-left">
                                           <li class="nav-item my-nav-link">
                                               <a href="{{url('/profile')}}" class="dropdown-item nav-link  text-dark"><i class="fas fa-user"></i> Profile</a>



                                           <li class="nav-item text-dark my-nav-link">
                                               <a class="dropdown-item nav-link text-left text-dark" href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                   <i class="fas fa-sign-out-alt"></i> Logout</a>
                                           </li>
                                       </ul>


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

           <main class="py-4" id="content-wrap">
               @include('includes.messages')
               @yield('content')
               <vue-progress-bar></vue-progress-bar>
           </main>
           <footer class="bg-lancer text-center text-white mb-0" id="footer">
               <div class="container-fluid">
                   <div class="row text-white">
                       <div class="col-md-2 col-lg-2 col-sm-12">
                           <img src="{{asset('/images/lancers_logo_inverted.png')}}" width="auto" height="30" alt="" loading="lazy">
                       </div>
                       <div class="col-md-3 col-lg-6 col-sm-12">
                           <p class="text-white">@Lancers {{date('Y')}}</p>
                       </div>
                       <div class="col-lg-1 col-md-2 col-sm-12 text-white">
                           <p><span class="fab fa-instagram"></span>&nbsp;  Instagram</p>
                       </div>
                       <div class="col-lg-1 col-md-2 col-sm-12">
                           <p><span class="fab fa-facebook"></span>&nbsp;  Facebook</p>
                       </div>
                       <div class="col-lg-1 col-md-2 col-sm-12">
                           <p><span class="fab fa-twitter"></span>&nbsp;  Twitter</p>
                       </div>
                       <div class="col-lg-1 col-md-1 col-sm-12">
                       </div>
                   </div>
               </div>
           </footer>
    </div>

    <script>
        $(document).ready(function(){
            setTimeout(function()
            {
                $('.alert').fadeOut('slow');
            },5000);
        });
    </script>

    {{--<script src="https://js.stripe.com/v3/"></script>--}}
@yield('script')
</body>
</html>
