<?php

namespace App\Providers;

use App\Models\Worker;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('cms.order.create',function($view){
                $workers=  Worker::select(['id','name'])->get();

                $view->with(compact('workers'));
        });
    }
}
