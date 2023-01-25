@extends('layouts.cms')
@section('navbar')
    @include('cms.include.navbar')
@endsection
@section('store-form')
   <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6 loginforms">
           <h3 class="text-center">Add Staff</h3>
           <form action="{{ route('cms.staff.store') }}" method="post">
               @csrf
               <div class="row mt-3">
                   <div class="col-md-6">
                       <label for="name">Name</label>
                       <input type="text" name="name" id="name" placeholder="naruto" class="form-control" value="{{ old('name') }}">
                   </div>
                   <div class="col-md-6">
                       <label for="email">Email</label>
                       <input type="email" name="email" id="email" placeholder="naruto@gmail.com" class="form-control" value="{{ old('email') }}">
                   </div>
               </div>
               <div class="row mt-3">
                   <div class="col-md-6">
                       <label for="password">Password</label>
                       <input type="password" name="password" id="password" placeholder="*****" class="form-control" >
                   </div>
                   <div class="col-md-6">
                       <label for="address">Address</label>
                       <input type="text" name="address" id="address" placeholder="hidden leaf" class="form-control" value="{{ old('address') }}">
                   </div>
               </div>
               <div class="row mt-3">
                   <div class="col-md-6">
                       <label for="phone">Phone</label>
                       <input type="text" name="phone" id="phone" placeholder="9876765434" class="form-control" value="{{ old('phone') }}">
                   </div>
                   <div class="col-md-6">
                       <label for="status">Status</label>
                       <select name="status" id="status" class="form-control">
                           <option value="Active">Active</option>
                           <option value="Inactive">Inactive</option>
                       </select>
                   </div>
               </div>
               <div class="row mt-3">
                   <div class="col-md-4">
                   </div>
                   <div class="col-md-4 text-center">
                       <button type="submit" class="btn button">Add Staff</button>
                   </div>
                   <div class="col-md-4"></div>
               </div>
           </form>
       </div>
       <div class="col-md-3"></div>
   </div>
@endsection
