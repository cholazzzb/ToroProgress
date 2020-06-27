@extends('layouts.app')

@section('content')
<div class="text-center mx-12 bg-gray-800">

    <h1 class="text-green-400 text-3xl p-4" style="background-color:#252b48;">Login</h1>
    <div class="flex justify-center" style="background-color:#252b48;">

        <form method="POST" action="{{ route('login') }}" class="bg-gray-900 w-1/2 border-4 border-green-400 py-4 mb-4">
            @csrf

            <div class="form-group row">
                <label for="email"
                    class="col-md-4 col-form-label text-green-400 text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="form-control text-green-400 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password"
                    class="col-md-4 col-form-label text-green-400 text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                        class="form-control text-green-400 @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label text-green-400" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit"
                        class="mx-10 mt-2 p-2 w-1/3 text-green-400 bg-gray-900 border-2 border-green-400 hover:bg-gray-800">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="tmx-10 mt-2 p-2 w-1/3 text-green-400 bg-gray-900 border-2 border-green-400 hover:bg-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

</div>
@endsection