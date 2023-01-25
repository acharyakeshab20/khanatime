@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('menu')
    <div class="row menu">
        <div class="col-md-6">
            <h3 class="text-start">worker Details</h3>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('cms.worker.create') }}" class="button text-center">Add User</a>
        </div>
    </div>
@endsection

@section('table')
    @if($workers->isNotEmpty())
{{--        @dump($workers);--}}
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                {{--                    <th>SN</th>--}}
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>
            @foreach($workers as $work)
                <tr>
                    {{--                        <td>{{ ++$i }}</td>--}}
                    <td>{{ $work->name }}</td>
                    <td>{{ $work->email }}</td>
                    <td>{{ $work->phone }}</td>
{{--                    <td>{{$work->address->city}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $workers->links() }}
    @else
        <h3 class="text-center text-muted">
            <p>---------------------------------------------------</p>
            <p class="text-muted text-center">Add your first data</p>
            <p>---------------------------------------------------</p>
        </h3>
    @endif
@endsection

