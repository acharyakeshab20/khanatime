@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center">Add Address</h3>
            <form action="{{ route('cms.address.store') }}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="naruto" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" placeholder="London" class="form-control" value="{{ old('city') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="state">State</label>
                        <select name="state" id="state"  class="form-control">
                            <option value="1" {{ old('state') == "1" ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('state') == "2" ? 'selected' : '' }}>2</option>
                            <option value="3" {{ old('state') == "3" ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('state') == "4" ? 'selected' : '' }}>4</option>
                            <option value="5" {{ old('state') == "5" ? 'selected' : '' }}>5</option>
                            <option value="6" {{ old('state') == "6" ? 'selected' : '' }}>6</option>
                            <option value="7" {{ old('state') == "7" ? 'selected' : '' }}>7</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="ward">ward</label>
                        <input type="number" name="ward" id="ward" placeholder="-------------" class="form-control" value="{{ old('ward') }}" min="1" step="1">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="zipcode">zipcode</label>
                        <input type="text" name="zipcode" id="zipcode" placeholder="zipcode" class="form-control" value="{{ old('zipcode') }}">
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn button">Add Address</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

