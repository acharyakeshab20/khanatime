@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('menu')
    <div class="row menu">
        <div class="col-md-6">
            <h3 class="text-start">Add Brand</h3>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('cms.brand.create') }}" class="button text-center">Add Brand</a>
        </div>
    </div>
@endsection
@section('table')
    @if($brand->isNotEmpty())
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Updated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brand as $brands)
                    <tr>
                        <td>{{ $brands->name }}</td>
                        <td>{{ $brands->status }}</td>
                        <td>{{ $brands->created_at->format('Y m d H:i:A') }}</td>
                        <td>{{ $brands->updated_at->format('Y m d H:i:A') }}</td>
                        <td>
                            <form action="{{ route('cms.brand.destroy',$brands->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Delete
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
                                                <button type="submit" class="btn button">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('cms.brand.edit',$brands->id) }}" class="btn button">Edit</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center text-muted">
            <p>-----------------------------------------------------------------</p>
            <p class="text-muted text-center">
                Add your first data
            </p>
            <p>-------------------------------------------------------------------</p>
        </h3>
    @endif
@endsection
