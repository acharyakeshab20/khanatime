@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('menu')
    <div class="row menu">
        <div class="col-md-6">
            <h3 class="text-start">Category Details</h3>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('cms.category.create') }}" class="button text-center">Add Category</a>
        </div>
    </div>
@endsection
@section('table')
    @if($category->isNotEmpty())
        <table class="table table-hover table-striped table-bordered">
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
                @foreach($category as $categories)
                    <tr>
                        <td>{{ $categories->name }}</td>
                        <td>{{ $categories->status }}</td>
                        <td>{{ $categories->created_at->format('Y m d H:i:A') }}</td>
                        <td>{{ $categories->updated_at->format('Y m d H:i:A') }}</td>
                        <td>
                            <form action="{{ route('cms.category.destroy',$categories->id) }}" method="post">
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
                                <a href="{{ route('cms.category.edit',$categories->id) }}" class="btn button">Edit</a>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3 class="text-center text-muted">
            <p> ------------------------------------------------------------ </p>
            <p class="text-center text-muted">
                Add Your First Data
            </p>
            <p> ------------------------------------------------------------ </p>
        </h3>
    @endif
@endsection
