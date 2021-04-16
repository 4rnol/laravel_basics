@extends('layouts.navbar')

@section('title', 'provider-spots')

@section('username', $usr->first_name)
@section('role', $usr->user_role)

@section('content')
    <h2>Provider Spots List</h2>
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
            >{{__('Spot name')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Browser: activate to sort column ascending"
                style="width: 227px;"
            >{{__('Title')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 236.2px;"
            >{{__('Subtitle')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Engine version: activate to sort column ascending"
                style="width: 120.2px;"
            >{{__('Description')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="CSS grade: activate to sort column ascending"
                style="width: 134px;"
            >{{__('Status')}}</th><th
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
        @foreach($spots as $spot)
            <tr class="gradeA odd" role="row">
                <td class="sorting_1">{{$spot->name}}</td>
                <td>{{$spot->title}}</td>
                <td>{{$spot->subtitle}}</td>
                <td class="center">{{$spot->description}}</td>
                <td class="center">{{$spot->status}}</td>
                <td>
                    <a type="button" href="{{ route('spots.edit',$spot) }}" style="display: inline-block" class="btn btn-danger">editar</a>
                    <form method="POST" style="display: inline-block" action="{{ route('spots.destroy',$spot) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-warning">Eliminar</button>
                    </form>
                </td>
            </tr></tbody>
        @endforeach
    </table>
@endsection
