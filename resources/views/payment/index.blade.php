@extends('layouts.navbar')

@section('title', 'payment-table')

@section('username', $usr->first_name)
@section('role', $usr->user_role)

@section('content')
    <h2>Payment List</h2>
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
            >{{__('Amount')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Browser: activate to sort column ascending"
                style="width: 227px;"
            >{{__('Description')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 236.2px;"
            >{{__('Provider')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="Engine version: activate to sort column ascending"
                style="width: 120.2px;"
            >{{__('Spot')}}</th>
            <th
                class="sorting"
                tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1"
                colspan="1"
                aria-label="CSS grade: activate to sort column ascending"
                style="width: 234px;"
            >{{__('Actions')}}</th></tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr class="gradeA odd" role="row">
                <td class="sorting_1">{{$payment->amount}}</td>
                <td>{{$payment->description}}</td>
                <td>{{$payment->spot_id}}</td>
                <td>{{$payment->provider_id}}</td>
                <td>
                    <a type="button" href="{{ route('payments.edit',$payment) }}" style="display: inline-block" class="btn btn-danger">edit</a>
                    <form method="POST" style="display: inline-block" action="{{ route('payments.destroy',$payment) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-warning">Eliminar</button>
                    </form>
                </td>
            </tr></tbody>
        @endforeach
    </table>
@endsection
