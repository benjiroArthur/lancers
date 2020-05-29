@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login-box justify-content-center col-md-5">
            <!-- /.login-logo -->
            <div class="card shadow">
                <div class="card-body login-card-body justify-content-center mt-5 mb-5">
                    <p class="login-box-msg text-center text-lancer text-bold h3 mt-3 mb-3"><b>Sing In</b></p>

                    <form action="{{route('login')}}" method="post" class="main-login-form loginBox">
                        @csrf

                        <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="input-group-append">
                                    <div class="input-group-text divBor">
                                        <span class="fas fa-envelope text-lancer bg-none"></span>
                                    </div>
                                </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text divBor">
                                    <span class="fas fa-lock text-success"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <a class="text-lancer d-block text-success" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>

                        <div class="col-12 mb-3">
                            <div class="icheck-primary text-lancer">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember text-lancer">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3" style="width: 100%">
                            <div class="col-12 mb-2 align-items-center">
                                <button type="submit" class="btn btn-success align-items-center butDiv">Sign In</button>
                            </div>


                        </div>
                    </form>
                    <br>
                    <div class="row justify-content-center">

                        <div class="col-12">
                            <p class="text-center text-danger">Don't Have Account? <a href="{{route('register')}}" class="text-lancer">Sign Up</a></p>

                        </div>
                    </div>

                </div>

                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>--}}
    {{--<example-component></example-component>--}}
    <login></login>
@endsection
