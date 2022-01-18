@extends('layouts.auth')


@section('content')
<div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
        <h2 class="card-title font-weight-bold mb-1">Let's Create An Account</h2>
        <p class="card-text mb-2">Make your visit to Riken Film Now</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="register-username">Username</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="riken123" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="register-email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="riken@example.com" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="register-password">Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="············" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="register-password">Comfirm Password</label>
                <div class="input-group input-group-merge form-password-toggle">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="············" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                    <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="javascript:void(0);">&nbsp;privacy policy & terms</a></label>
                </div>
            </div>
            <button class="btn btn-primary btn-block" tabindex="5" name="signup">Sign up</button>
        </form>
        <p class="text-center mt-2"><span>Already have an account?</span><a href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a></p>
        <div class="divider my-2">
            <div class="divider-text">or</div>
        </div>
        <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
    </div>
</div>
<!-- /Register-->

@endsection
