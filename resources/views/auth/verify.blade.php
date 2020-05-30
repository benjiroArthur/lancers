@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="login-box justify-content-center col-md-5">
            <!-- /.login-logo -->
            <div class="card shadow">
                <div class="card-body login-card-body justify-content-center mt-5 mb-5">
                    <div class="card-image text-center">
                        <img src="{{asset('/images/lancers_logo.png')}}" width="auto" height="50" alt="" loading="lazy">
                    </div>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                        <p class="login-box-msg text-center text-lancer h3 mt-3 mb-3"><b>Verify Your Email Address</b></p>

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>

                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
