@extends('layouts.navbar')

@section('title', 'spot-providers')

@section('username', $usr->first_name)
@section('role', $usr->user_role)

@section('content')
    <h2>Spot Providers List</h2>
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
                style="width: 205.8px;"
            >{{__('Business name')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Browser: activate to sort column ascending"
                style="width: 227px;"
            >{{__('address')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 236.2px;"
            >{{__('Website')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Engine version: activate to sort column ascending"
                style="width: 120.2px;"
            >{{__('Business number')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="CSS grade: activate to sort column ascending"
                style="width: 134px;"
            >{{__('Dob')}}</th><th
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
        @foreach($providers as $provider)
            <tr class="gradeA odd" role="row">
                <td class="sorting_1">{{$provider->bussines_name}}</td>
                <td>{{$provider->address}}</td>
                <td>{{$provider->website}}</td>
                <td class="center">{{$provider->business_phone}}</td>
                <td class="center">{{$provider->dob}}</td>
                <td>
                    <a type="button" href="{{ route('providers.edit',$provider) }}" style="display: inline-block" class="btn btn-danger">editar</a>
                    <form method="POST" style="display: inline-block" action="{{ route('providers.destroy',$provider) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-warning">Eliminar</button>
                    </form>
                </td>
            </tr></tbody>
        @endforeach
    </table>
@endsection
