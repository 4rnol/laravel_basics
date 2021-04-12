@extends('layouts.navbar')

@section('title', 'spot-edit')

@section('content')
    <h2>Edit spot</h2>

    <form action="{{route('spots.update',$spot)}}" method="POST">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Spot Name') }}</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="name"
                name="name"
                value="{{$spot->name}}"
            >
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                aria-describedby="emailHelp"
                value="{{$spot->title}}"
            >
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }}</label>
            <input
                type="text"
                class="form-control @error('subtitle') is-invalid @enderror"
                id="subtitle"
                name="subtitle"
                aria-describedby="emailHelp"
                value="{{$spot->subtitle}}"
            >
            @error('subtitle')
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
                value="{{$spot->description}}"
            >
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
            <input
                type="text"
                class="form-control @error('status') is-invalid @enderror"
                id="status"
                name="status"
                aria-describedby="emailHelp"
                value="{{$spot->status}}"
            >
            @error('status')
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
                        @if($spot->providers_id==$provider->id)
                            selected
                        @endif
                    >{{$provider->bussines_name}}</option>
                @endforeach
            </select>
            @error('providers_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
