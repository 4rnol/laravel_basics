@extends('layouts.navbar')

@section('title', 'user-edit')

@section('content')
    <h2>Editar Usuario</h2>

    <form action="{{route('user.update',$user)}}" method="post">

        @csrf
        @method('put')

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input
                type="text"
                class="form-control"
                id="first_name"
                name="first_name"
                aria-describedby="emailHelp"
                value='{{$user->first_name}}'
            >
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input
                type="text"
                class="form-control"
                id="last_name"
                name="last_name"
                aria-describedby="emailHelp"
                value={{$user->last_name}}
            >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                aria-describedby="emailHelp"
                value={{$user->email}}
            >
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input
                type="text"
                class="form-control"
                id="phone_number"
                name="phone_number"
                aria-describedby="emailHelp"
                value={{$user->phone_number}}
            >
        </div>
        <div class="mb-3">
            <label for="user_role" class="form-label">User Role</label>
            <input
                type="text"
                class="form-control"
                id="user_role"
                name="user_role"
                aria-describedby="emailHelp"
                value={{$user->user_role}}
            >
        </div><div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="text"
                class="form-control"
                id="password"
                name="password"
                aria-describedby="emailHelp"
                value='{{Crypt::decrypt($user->password)}}'
            >
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
@endsection
