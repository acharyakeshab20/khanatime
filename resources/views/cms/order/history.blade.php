@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection

@if($history->isNotEmpty())
    @section('tables')
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>sku</th>
                <th>Name</th>
                <th>qty</th>
                <th>rate</th>
                <th>address</th>
                <th>Deleted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history as $myhistory)
                <tr>
                    <td>{{ $myhistory->sku }}</td>
                    <td>{{ $myhistory->name }}</td>
                    <td>{{ $myhistory->qty }}</td>
                    <td>{{ $myhistory->rate }}</td>
                    <td>{{ $myhistory->address }}</td>
                    <td>{{ $myhistory->deleted_at->format('Y m d H:i:A') }}</td>
                    <td>
                        <form action="{{ route('cms.order.restore',$myhistory->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-success btn-lg">Restore</button>
                            <!-- Button trigger modal -->
                        </form>
                        <form action="{{ route('cms.order.permanent',$myhistory->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-success btn-lg">Delete</button>
                            <!-- Button trigger modal -->
                        </form>
{{--                        <a href="{{ route('cms.order.permanent',$myhistory->id) }}" class="btn btn-lg btn-success">Delete</a>--}}

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@else
    <h2 class="text-center text-muted">
        Add your first data
    </h2>
@endif
