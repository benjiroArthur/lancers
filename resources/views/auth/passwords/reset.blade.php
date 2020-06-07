@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login-box justify-content-center col-md-5">
            <!-- /.login-logo -->
            <div class="card shadow">
                <div class="card-body login-card-body justify-content-center mt-5 mb-5">
                    <div class="card-image text-center">
                        <img src="{{asset('/images/lancers_logo.png')}}" width="auto" height="50" alt="">
                    </div>
                    <p class="login-box-msg text-center text-lancer h3 mt-3 mb-3"><b>Reset Password</b></p>

                    <form action="{{route('password.update')}}" method="post" class="main-login-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input id="password-confirm" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="row text-center" style="width: 100%">
                            <div class="col-12 mb-2 text-center">
                                <button type="submit" class="btn btn-success bg-lancer" style="width: 14rem">Reset Password</button>
                            </div>

                        </div>
                    </form>

                </div>

                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
