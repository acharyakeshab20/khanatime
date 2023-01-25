@extends('layouts.cms')

{{--@section('navbar')--}}
{{--    @include('cms.include.navbar')--}}
{{--@endsection--}}

@section('login-form')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="loginform">
                <h3 class="login-form-head text-center mt-3">Login Form</h3>
                <form action="{{ route('cms.login.login') }}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Luffy@gmail.com" autocomplete="on" class="form-control" required>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-3 mb-2">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="*********"  class="form-control" required>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-3 mb-2">
                        <div class="col"></div>
                        <div class="col">
                            <input type="checkbox" name="remember" id="remember" class="form-check-label">
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="col"></div>
                    </div>

                    <div class="row mt-3 mb-2">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <button type="submit" class="btn button">Login</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

