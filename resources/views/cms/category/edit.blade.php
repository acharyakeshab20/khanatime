@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center">Edit Staff</h3>
            <form action="{{ route('cms.category.update',$category->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="naruto" class="form-control" value="{{ old('name',$category->name) }}">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Active" {{ old('status') == $category->status ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status') == $category->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn button">Update Category</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

