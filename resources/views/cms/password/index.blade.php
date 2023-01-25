@extends('layouts.cms')

@section('navbar')
    @include('cms.include.navbar')
@endsection

@section('store-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 loginforms">
            <h3 class="text-center mt-3">Edit Profile</h3>
            <form action="{{ route('cms.password.update') }}" method="post">
                @method('patch')
                @csrf
                <div class="row mt-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="old_password">Old Password</label>
                        <input type="text" name="old_password" id="old_password" placeholder="Your Old Password" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" placeholder="Your New Password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="new_password_confirmation">Confirm Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm Your Password" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center mb-4">
                        <button type="submit" class="btn button">Update Password</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

