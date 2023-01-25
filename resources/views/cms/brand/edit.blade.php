@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection
{{--@section('navbar')--}}
{{--    @include('cms.include.navbar')--}}
{{--@endsection--}}
@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center mt-4">Edit Brand</h3>
            <form action="{{ route('cms.brand.update',$brand->id) }}" method="post">
                @method('patch')
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="naruto" class="form-control" value="{{ old('name',$brand->name) }}">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Active" {{ old('status') == $brand->status ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status') == $brand->status ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="submit" class="btn button">Update Brand</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

