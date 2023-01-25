<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo;

    public function __construct(){
            $this->redirectTo=route('cms.dashboard.index');
            $this->middleware('guest:cms')->except('logout');
    }

    public function index(){
            return view('cms.login.index');
        }

        public function authenticated(Request $request, $user)
        {
            flash('User Logged in Successfully');
        }

//        public function logout(Request $request)
//        {
//            if (Auth::guard('cms')){
//                return redirect()->route('cms.login.index');
//            }
//        }

    public function guard()
        {
            return Auth::guard('cms');
        }



}
