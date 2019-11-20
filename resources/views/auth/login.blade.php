@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h4 class="text-center text-primary mt-5">{{ __('List of shopping') }}</h4>
                <br>
                <form action="{{ route('login') }}" method="post">
                    @csrf
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
                        <input type="password" class="form-control input-login-register" name="password" id="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="float-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label small" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <div class="float-right">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary form-control mt-3">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
                <hr class="mt-4 mb-5">
                <a href="{{ route('redirect') }}" class="form-control google-btn text-center"><i
                            class="fab fa-google"></i>&nbsp;&nbsp;{{ __('Sign in with Google') }}</a>
            </div>
        </div>
    </div>

@endsection
