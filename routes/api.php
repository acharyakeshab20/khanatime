<?php

use App\Http\Controllers\Api\StaffApiController;
use App\Http\Controllers\Back\StaffController;
use App\Http\Controllers\Back\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('product-sku', function(Request $request){
//    foreach ($request->sku as $sku){
//        $products = \App\Models\Products::where('sku', $sku)->firstOrFail('id');
//    }
    $product = \App\Models\Products::where('sku', $request->sku)->firstOrFail('id');
    return $product->id;
});

//products api
//Route::prefix('products/')->group(function (){
//    Route::name('api.product.')->group(function (){
//        Route::controller(ProductsController::class)->group(function(){
//            Route::get('all/{id?}/{sku?}','all_Product');
//            Route::post('add_product','add_product');
////            Route::get('{id}','getProduct')->name('getStudent');
////            Route::get('{id}/image','getImages')->name('getImages');
////            Route::get('{id}/sku','getSku')->name('sku');
////            Route::get('{id}/imp_details','getName')->name('getName');
////            Route::get('{id}/description','get_description')->name('get_description');
////            Route::get('{sku}/sku_product','get_sku')->name('get_sku');
////            Route::get('sku/all','get_all_sku')->name('get_all_sku');
////            Route::get('{sku}/product/Imp_details','get_all_imp_sku')->name('get_all_imp');
//        });
//    });
//});

////////////////////////Public Routes////////////////////////////////////
Route::prefix('users/')->group(function(){
    Route::get('all/{id?}/',[StaffApiController::class,'staff_data']);
    Route::get('{name}/',[StaffApiController::class,'staffSku']);
    Route::get('{phone}/phones',[StaffApiController::class,'staffPhone']);
    Route::get('status/{status}',[StaffApiController::class,'ActiveStaff']);
    Route::post('add_staff/',[StaffApiController::class,'addStaff']);
});


/////////////Protected Routes///////////////
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('users/')->group(function (){
        Route::put('update_staff/{id}',[StaffApiController::class,'updateStaff']);
        Route::delete('delete_staff/{id}',[StaffApiController::class,'deleteStaff']);
    });
});

