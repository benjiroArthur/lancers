<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @auth
        <meta name="user-id" content="{{ Auth::user()->id }}">
        <meta name="status" content="{{ Auth::user()->active }}">
        <meta name="pro-update" content="{{ Auth::user()->profile_updated }}">
    @else
        <meta name="user-id" content="0">
        <meta name="status" content="0">
        <meta name="pro-update" content="2">
    @endauth

    <title>{{ config('app.name', 'Lancers') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{--icon--}}
    <link rel="icon" href="{{asset('assets/images/logo.png')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini bg-lancer-light">
<div class="wrapper d-bord-wrapper" id="app">
    <!--    navbar -->
<div>
    @include('includes.dashboard.headerbar')

    @include('includes.dashboard.navbar')
</div>

<!-- Main Sidebar Container -->

@include('includes.dashboard.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-lancer-light">

        <!-- Main content -->
        <div class="content d-bord-wrapper" v-cloak>
            <div class="container-fluid mt-3">

                {{--@yield('content')--}}

                <router-view>

                    {{--Vue elements goes here--}}
                </router-view>
                <vue-progress-bar></vue-progress-bar>
            </div>

        </div>

        <div class="animated slower myLoadDiv1" :class="true ? 'zoomOut':''" v-if="pageLoader">
            <div class="myLoadDiv2 row">
                <div class="justify-content-center myLoadDiv3 col-sm-12 ">
                    <img src="{{asset('images/lancers.gif')}}" alt="Lancers" height="auto" width="auto" class="animated fadeInDown img-fluid">
                </div>

            </div>
        </div>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="bg-lancer main-footer">
        <div class="container-fluid ml-4 mr-3 mt-3 mb-3">
            <div class="row mt-3 mb-3">
                <div class="col-md-2">
                    <p></p>
                    <p class="text-bold h3 text-white">Lancers</p>
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

<!-- ./wrapper -->

{{--scripts--}}

@yield('script')

</body>
</html>
