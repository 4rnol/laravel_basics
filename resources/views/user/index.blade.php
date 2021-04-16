@extends('layouts.navbar')

@section('title', 'users-table')

@section('username', $usr->first_name)
@section('role', $usr->user_role)

@section('content')
    <h2>Users List</h2>
    <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
        <thead>
        <tr role="row">
            <th
                class="sorting_asc"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-sort="ascending"
                aria-label="Rendering engine: activate to sort column descending"
                style="width: 105.8px;"
            >Username</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Browser: activate to sort column ascending"
                style="width: 127px;"
            >Lastname</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 236.2px;"
            >Email</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Engine version: activate to sort column ascending"
                style="width: 120.2px;"
            >Phone_number</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="CSS grade: activate to sort column ascending"
                style="width: 134px;"
            >User_role</th><th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="CSS grade: activate to sort column ascending"
                style="width: 234px;"
            >Acciones</th></tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="gradeA odd" role="row">
                <td class="sorting_1">{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td class="center">{{$user->phone_number}}</td>
                <td class="center">{{$user->user_role}}</td>
                <td>
                    <a type="button" href="{{ route('users.edit',$user) }}" style="display: inline-block" class="btn btn-danger">editar</a>
                    <form method="POST" style="display: inline-block" action="{{ route('users.destroy',$user) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-warning">Eliminar</button>
                    </form>
                    <a type="button" href="{{ route('users.providers.index',$user) }}" style="display: inline-block" class="btn btn-primary">Proveedores</a>
                </td>
            </tr></tbody>
        @endforeach
    </table>
@endsection
