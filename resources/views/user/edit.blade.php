@extends('layouts.navbar')

@section('title', 'user-edit')

@section('content')
    <h2>Editar Usuario</h2>

    <form action="{{route('users.update',$user)}}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
            <input
                type="text"
                class="form-control @error('first_name') is-invalid @enderror"
                id="first_name"
                name="first_name"
                value='{{$user->first_name}}'
            >
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
            <input
                type="text"
                class="form-control @error('last_name') is-invalid @enderror"
                id="last_name"
                name="last_name"
                aria-describedby="emailHelp"
                value={{$user->last_name}}
            >
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
            <input
                type="text"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                value={{$user->email}}
            >
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone number') }}</label>
            <input
                type="text"
                class="form-control @error('phone_number') is-invalid @enderror"
                id="phone_number"
                name="phone_number"
                aria-describedby="emailHelp"
                value={{$user->phone_number}}
            >
            @error('phone_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_role" class="col-md-4 col-form-label text-md-right">{{ __('User role') }}</label>
            <input
                type="text"
                class="form-control @error('user_role') is-invalid @enderror"
                id="user_role"
                name="user_role"
                aria-describedby="emailHelp"
                value={{$user->user_role}}
            >
            @error('user_role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><div class="mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <input
                type="text"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                aria-describedby="emailHelp"
            >
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
