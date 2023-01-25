@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center">Add Details</h3>
            <form action="{{ route('cms.worker.store') }}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="naruto" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" placeholder="email" class="form-control" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="location_id">Address</label>
{{--                        @dump($address)--}}
                        <select name="location_id" id="location_id" class="form-control">
                            @foreach($address as $adds)
                                <option value="{{ $adds->id }}">{{ $adds->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn button">Add Details</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>

    </div>
@endsection

