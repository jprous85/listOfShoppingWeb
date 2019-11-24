@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-6">
                <div class="float-left">
                    <a href="{{ url('/') }}" class="text-title-navbar">
                        <span><i class="fas fa-arrow-left"></i></span>&nbsp;
                        <span><i class="fas fa-home"></i></span>
                    </a>
                </div>
                <h4 class="text-center text-primary mt-5">{{ __('List of shopping') }}</h4>

                <div class="row">
                    <div class="col-md-12 color-bottom-row">
                        <div class="float-right">
                            <span class="color-login-text">Register</span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group mt-4">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control input-login-register" name="name" id="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-4">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email" class="form-control input-login-register" name="email" id="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input type="password" class="form-control input-login-register" name="password" id="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control input-login-register" name="password_confirmation" id="password-confirm" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary form-control mt-3">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
                <hr class="mt-4 mb-5">
                <a href="{{ route('redirect') }}" class="form-control google-btn text-center"><i
                            class="fab fa-google"></i>&nbsp;&nbsp;{{ __('Register with Google') }}</a>
            </div>
        </div>
    </div>
@endsection