<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class Homecontroler extends Controller
{
    public function index(){
//        flash('Demo message');
        $featured_P= Products::where('status','Active')
            ->where('featured','Yes')
//            ->limit(4)
            ->inRandomOrder()
            ->get();
//        dd($featured_P);
        return view('front.home.index',compact('featured_P'));
    }
}
