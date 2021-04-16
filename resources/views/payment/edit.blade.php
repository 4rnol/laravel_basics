@extends('layouts.navbar')

@section('title', 'payment-edit')

@section('username', $usr->first_name)
@section('role', $usr->user_role)

@section('content')
    <h2>Payment edit</h2>

    <form action="{{route('payments.update',$payment)}}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
            <input
                type="text"
                class="form-control @error('amount') is-invalid @enderror"
                id="amount"
                name="amount"
                value="{{$payment->amount}}"
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
                value="{{$payment->description}}"
            >
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="providers_id" class="col-md-4 col-form-label text-md-right">{{ __('Providers') }}</label>
            <select id="providers_id" name="providers_id" class="form-select " aria-label="Default select example">
                <option selected>Select a provider</option>
                @foreach($providers as $provider)
                    <option
                        value="{{$provider->id}}"
                        @if($payment->provider_id==$provider->id)
                            selected
                        @endif
                    >{{$provider->bussines_name}}
                    </option>
                @endforeach
            </select>
            @error('providers_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="spots_id" class="col-md-4 col-form-label text-md-right">{{ __('Spots') }}</label>
            <select id="spots_id" name="spots_id" class="form-select " aria-label="Default select example">
                <option selected>Select a spot</option>
                @foreach($spots as $spot)
                    <option
                        value="{{$spot->id}}"
                        @if($payment->spot_id==$spot->id)
                            selected
                        @endif
                    >{{$spot->name}}</option>
                @endforeach
            </select>
            @error('spots_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
