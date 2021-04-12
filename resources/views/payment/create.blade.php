@extends('layouts.navbar')

@section('title', 'payment-create')

@section('content')
    <h2>Payment create</h2>

    <form action="{{route('payments.store')}}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
            <input
                type="text"
                class="form-control @error('amount') is-invalid @enderror"
                id="amount"
                name="amount"
            >
            @error('amount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
            <input
                type="text"
                class="form-control @error('description') is-invalid @enderror"
                id="description"
                name="description"
                aria-describedby="emailHelp"
            >
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="provider_id" class="col-md-4 col-form-label text-md-right">{{ __('Providers') }}</label>
            <select id="provider_id" name="provider_id" class="form-select " aria-label="Default select example">
                <option selected>Select a provider</option>
                @foreach($providers as $provider)
                    <option value="{{$provider->id}}" >{{$provider->bussines_name}}</option>
                @endforeach
            </select>
            @error('provider_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="spot_id" class="col-md-4 col-form-label text-md-right">{{ __('Spots') }}</label>
            <select id="spot_id" name="spot_id" class="form-select " aria-label="Default select example">
                <option selected>Select a provider</option>
                @foreach($spots as $spot)
                    <option value="{{$spot->id}}" >{{$spot->name}}</option>
                @endforeach
            </select>
            @error('spot_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
@endsection
