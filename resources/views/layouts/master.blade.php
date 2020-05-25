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
<body class="bg-lancer-light">
    <div id="app">
       @include('includes.nav.navbarTop')

        <main class="py-4">
            <router-view>
                {{--Vue elements goes here--}}
            </router-view>
            <vue-progress-bar></vue-progress-bar>
        </main>

        <footer class="bg-lancer p-4">
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
</body>
</html>
