@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center">Add Brand</h3>
            <form action="{{ route('cms.brand.store') }}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Thoushand Sunny" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Active" {{ old('status') }}>Active</option>
                            <option value="Inactive" {{ old('Inactive') }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn button">Add Brand</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
