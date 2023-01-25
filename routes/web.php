<?php

use App\Http\Controllers\Back\BrandController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\LoginController;
//use App\Http\Controllers\Back\OrderController;
use App\Http\Controllers\Back\OrderController;
use App\Http\Controllers\Back\PasswordController;
use App\Http\Controllers\Back\ProductsController;
use App\Http\Controllers\Back\ProfileController;
use App\Http\Controllers\Back\StaffController;
//use App\Http\Controllers\Buyers\AddressController;
//use App\Http\Controllers\Buyers\BuyerController;
//use App\Http\Controllers\Buyers\PurcherController;
//use App\Http\Controllers\Buyers\WorkerController;
use App\Http\Controllers\Data\QueryController;
use App\Http\Controllers\Front\Homecontroler;
use Illuminate\Support\Facades\Route;

Route::prefix('/cms/')->group(function(){
    Route::name('cms.')->group(function(){
        Route::middleware(['auth:cms'])->group(function(){
            Route::middleware(['inactive.user'])->group(callback: function(){
                Route::get('profile/edit',[ProfileController::class,'index'])->name('profile.index');
                Route::patch('profile/update',[ProfileController::class,'update'])->name('profile.update');
                Route::get('password/edit',[PasswordController::class,'index'])->name('password.index');
                Route::patch('password/update',[PasswordController::class,'update'])->name('password.update');
                Route::resources([
                    'staff'=>StaffController::class,
                    'category'=>CategoryController::class,
                    'brand'=>BrandController::class,
                    'query'=>QueryController::class,
                    'product'=> ProductsController::class,
                    'order' => OrderController::class,
//                    'address'=> AddressController::class,
//                    'worker'=> WorkerController::class,
//                    'order'=>\App\Http\Controllers\Buyers\OrderController::class,
                ],[
                    'except'=>['show']
                ]);
                Route::prefix('order/')->group(function(){
//                    Route::middleware('password.confirm')->group(function(){
                        Route::get('history',[OrderController::class,'history'])->name('order.history');
                        Route::patch('restore/{restore}',[OrderController::class,'restore'])->name('order.restore');
                        Route::delete('permanent_delete/{delete}',[OrderController::class,'permanent'])->name('order.permanent');
//                    });
                });
//                Route::get('product/search',[ProductsController::class,'search'])->name('product.search');
//
            });
            Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
            Route::post('logout',[LoginController::class,'logout'])->name('logout');
        });
//        Route::get('/confirm-password',[PasswordController::class,'confirmPassword'])->name('password.confirm');
        Route::get('login',[LoginController::class,'index'])->name('login.index');
        Route::post('login',[LoginController::class,'login'])->name('login.login');
    });
});

Route::prefix('/front/')->group(function (){
    Route::name('front.')->group(function(){
        Route::get('dashboard',[Homecontroler::class,'index'])->name('home.index');
    });
});

Route::get('/',[Homecontroler::class,'index']);


