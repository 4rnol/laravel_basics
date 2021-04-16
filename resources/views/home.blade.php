@extends('layouts.navbar')

@section('title', 'home')

@section('username', $usr->first_name)

@section('role', $usr->user_role)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success " role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
