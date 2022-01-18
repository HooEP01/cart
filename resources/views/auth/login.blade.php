@extends('layouts.auth')

@section('content')
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" style="height:600px"> 
        <h2 class="card-title font-weight-bold mb-1">Welcome to<br> Riken Automotive Films Admin Login </h2>
        <p class="card-text mb-2">Please sign-in to your account </p>

        <form action="{{ route('login') }}" method="POST">
             @csrf

            <div class="form-group">
                <label class="form-label" for="login-email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="john@example.com" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <label for="login-password">Password</label>@if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input id="password" type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" name="password" placeholder="············" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                </div>
            </div>
            <button name="signin" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
        </form>
        <p class="text-center mt-2"><span>New on our platform?</span><a href="{{ route('register') }}"><span>&nbsp;Create an account</span></a></p>
        <div class="divider my-2">
            <div class="divider-text">or</div>
        </div>
        <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
    </div>
</div>
<!-- /Login-->

@endsection

