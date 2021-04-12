@extends('layouts.navbar')

@section('title', 'provider-create')

@section('content')
    <h2>Provider create</h2>

    <form action="{{route('providers.store')}}" method="POST">

        @csrf


        <div class="mb-3">
            <label for="bussines_name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>
            <input
                type="text"
                class="form-control @error('bussines_name') is-invalid @enderror"
                id="bussines_name"
                name="bussines_name"
            >
            @error('bussines_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                id="address"
                name="address"
                aria-describedby="emailHelp"
            >
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>
            <input
                type="text"
                class="form-control @error('website') is-invalid @enderror"
                id="website"
                name="website"
                aria-describedby="emailHelp"
            >
            @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="business_phone" class="col-md-4 col-form-label text-md-right">{{ __('Business Phone') }}</label>
            <input
                type="text"
                class="form-control @error('business_phone') is-invalid @enderror"
                id="business_phone"
                name="business_phone"
                aria-describedby="emailHelp"
            >
            @error('business_phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('dob') }}</label>
            <input
                type="date"
                class="form-control @error('dob') is-invalid @enderror"
                id="dob"
                name="dob"
                aria-describedby="emailHelp"
            >
            @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="users_id" class="col-md-4 col-form-label text-md-right">{{ __('Users') }}</label>
            <select id="users_id" name="users_id" class="form-select " aria-label="Default select example">
                <option selected>Select an user</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}" >{{$user->first_name}} {{$user->last_name}}</option>
                @endforeach
            </select>
            @error('users_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
