<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profile=Auth::guard('cms')->user();
//        dd($profile);
        return view('cms.profile.index',compact('profile'));
    }

    public function update(Request $request){
        $profile=Auth::guard('cms')->user();
        $validation=$this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'status'=>'required|in:Active,Inactive',
        ]);
        $profile->update($validation);
        flash('profile updated successfully');
        return redirect()->route('cms.profile.index');
    }
}
