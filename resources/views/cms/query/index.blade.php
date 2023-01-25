@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('table')
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created Date</th>
                <th>Updated Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
{{--                <td>{{ $staffs->name }}</td>--}}
                <td>{{ $staffs->email }}</td>
                <td>{{ $staffs->phone }}</td>
                <td>{{ $staffs->address }}</td>
                <th>{{ $staffs->created_at }}</th>
                <th>{{ $staffs->updated_at}}</th>
            </tr>
        </tbody>
    </table>
@endsection
