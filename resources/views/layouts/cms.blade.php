<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ url('/') }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('public/css/cms.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>{{config('app.name')}}</title>
</head>
<body>

    @yield('navbar')
    @yield('inactive')
    @yield('login-form')
    @yield('menu')
    @yield('table')
    @yield('store-form')
    @yield('tables')
    <div class="row toast position-fixed bottom-0 start-0 my-3 mx-3">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Message</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ $error }}
                    </div>
                </div>
            @endforeach
        @endif
        @include('flash::message')
    </div>
<script src="{{ url('public/js/cms.js') }}"></script>
</body>
</html>
