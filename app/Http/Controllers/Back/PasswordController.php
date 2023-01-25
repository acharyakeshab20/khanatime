<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
        public function index(){
            $password=Auth::guard('cms')->user();
//            dd($password);
            return view('cms.password.index',compact('password'));
        }

        public function update(Request $request){
            $password=Auth::guard('cms')->user();
            $validation=$this->validate($request,[
                'old_password'=> 'required|current_password:cms',
                'new_password'=>'required|confirmed'
            ]);

            $password->update([
                'password'=>$request->new_password,
            ]);

            flash('Password Updated successfully');
            return redirect()->route('cms.password.index');
        }

        public function confirmPassword(){
            return view('cms.password.confirm');
        }
}
