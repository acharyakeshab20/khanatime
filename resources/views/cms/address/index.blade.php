@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('menu')
    <div class="row menu">
        <div class="col-md-6">
            <h3 class="text-start">Address Details</h3>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('cms.address.create') }}" class="button text-center">Add Address</a>
        </div>
    </div>
@endsection

@section('table')
    @if($address->isNotEmpty())
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                {{--                    <th>SN</th>--}}
                <th>Name</th>
                <th>city</th>
                <th>state</th>
                <th>ward</th>
                <th>zipcode</th>
            </tr>
            </thead>
            <tbody>
            @foreach($address as $add)
                <tr>
                    {{--                        <td>{{ ++$i }}</td>--}}
                    <td>{{ $add->name }}</td>
                    <td>{{ $add->city }}</td>
                    <td>{{ $add->state }}</td>
                    <td>{{ $add->ward }}</td>
                    <td>{{ $add->zipcode }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $address->links() }}
    @else
        <h3 class="text-center text-muted">
            <p>---------------------------------------------------</p>
            <p class="text-muted text-center">Add your first data</p>
            <p>---------------------------------------------------</p>
        </h3>
    @endif
@endsection
