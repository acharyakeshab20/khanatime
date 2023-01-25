@extends('layouts.cms')
{{--@section('navbar')--}}
{{--    @include('cms.include.navbar')--}}
{{--@endsection--}}

@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('inactive')
    @if(auth('cms')->user()->status=='Inactive')
        <h2 class="text-center">
            <p>-----------------------------------------------------------</p>
            <p class="text-center text-muted">
                User is Inactive !!!!! Please contact administration
            </p>
            <p>-----------------------------------------------------------</p>
        </h2>
    @endif
@endsection

