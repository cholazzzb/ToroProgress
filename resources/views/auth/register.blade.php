@extends('layouts.app')

@section('content')
<div class="text-center pt-6" style="background-color:#252b48;">
    <h1 class="text-green-400 py-2 mb-4 text-3xl" style="background-color:#252b48;"">Register</h1>
    <div class="flex justify-center" style="background-color:#252b48;">
        <form method="POST" action="{{ route('register') }}"
            class="bg-gray-900 w-1/2 border-4 border-green-400 py-4 mb-4">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-green-400 text-md-right">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control text-green-400 @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email"
                    class="col-md-4 col-form-label text-green-400 text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email"
                        class="form-control text-green-400 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
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
                        required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                    class="col-md-4 col-form-label text-green-400 text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control text-green-400"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <button type="submit"
                    class="mx-10 mt-2 p-2 w-full text-green-400 bg-gray-900 border-2 border-green-400 hover:bg-gray-800">
                    {{ __('Register') }}
                </button>
            </div>
    </div>
    </form>
</div>

@endsection