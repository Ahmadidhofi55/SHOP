@extends('layouts.app')
@section('title','Register')
@section('contend')
<div class="container-login100">
    <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="{{ URL::to('/') }}/users.png" alt="IMG">
        </div>

        <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title">
                Register
            </span>

            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input100  @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="name">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <input class="input100  @error('email') is-invalid @enderror" type="text" name="email" id="email" placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input class="input100  @error('password') is-invalid @enderror"  autocomplete="new-password" type="password" name="password" id="password" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Register
                </button>
            </div>

            <div class="text-center p-t-136">
                <a class="txt2" href="{{ route('login') }}">
               You Have Account ?
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
