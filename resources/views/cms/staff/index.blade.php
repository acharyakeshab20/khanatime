@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('menu')
    <div class="row menu">
        <div class="col-md-6">
            <h3 class="text-start">Staff Details</h3>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('cms.staff.create') }}" class="button text-center">Add Staff</a>
        </div>
    </div>
@endsection

@section('table')
    @if($staff->isNotEmpty())
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
{{--                    <th>SN</th>--}}
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($staff as $staffs)
                    <tr>
{{--                        <td>{{ ++$i }}</td>--}}
                        <td>{{ $staffs->name }}</td>
                        <td>{{ $staffs->email }}</td>
                        <td>{{ $staffs->phone }}</td>
                        <td>{{ $staffs->address }}</td>
                        <td>{{ $staffs->status }}</td>
                        <td>{{ $staffs->created_at }}</td>
                        <td>{{ $staffs->updated_at}}</td>
                        <td>
                            <form action="{{ route('cms.staff.destroy',$staffs->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                The Staff Will be Deleted
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn button" data-bs-dismiss="modal">Close</button>
{{--                                                <button type="button" class="btn button">Delete</button>--}}
                                                <button type="submit" class="btn button">Deletes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('cms.staff.edit',$staffs->id) }}" class="btn button">  <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{ $staff->links() }}
    @else
        <h3 class="text-center text-muted">
            <p>---------------------------------------------------</p>
            <p class="text-muted text-center">Add your first data</p>
            <p>---------------------------------------------------</p>
        </h3>
    @endif
@endsection




