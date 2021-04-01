@extends('layouts.app')

@section('title', 'Register')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="firstName"
                                       type="text"
                                       class="form-control @error('firstName') is-invalid @enderror"
                                       name="firstName"
                                       value="{{ old('firstName') }}"
                                       required
                                       autocomplete="firstName"
                                >
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="lastName"
                                    type="text"
                                    class="form-control @error('lastName') is-invalid @enderror"
                                    name="lastName"
                                    value="{{ old('lastName') }}"
                                    required
                                    autocomplete="lastName"
                                >
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="phoneNumber"
                                    type="text"
                                    class="form-control @error('phoneNumber') is-invalid @enderror"
                                    name="phoneNumber"
                                    value="{{ old('phoneNumber') }}"
                                    required
                                    autocomplete="phoneNumber"
                                >
                                @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="fbId" class="col-md-4 col-form-label text-md-right">{{ __('Facebook Nick') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="fbId"
                                    type="text"
                                    class="form-control @error('fbId') is-invalid @enderror"
                                    name="fbId"
                                    value="{{ old('fbId') }}"
                                    required
                                    autocomplete="fbId"
                                >
                                @error('fbId')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="userRole" class="col-md-4 col-form-label text-md-right">{{ __('User Role') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="userRole"
                                    type="text"
                                    class="form-control @error('userRole') is-invalid @enderror"
                                    name="userRole"
                                    value="{{ old('userRole') }}"
                                    required
                                    autocomplete="userRole"
                                >
                                @error('userRole')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input
                                    id="password-confirm"
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                >
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
