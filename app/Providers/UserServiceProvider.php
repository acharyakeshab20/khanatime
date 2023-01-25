<?php

namespace App\Providers;

use App\Models\Address;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        View::composer('cms.worker.worker', function($view){
                $address= Address::select(['id','name'])->get();
                $view->with(compact('address'));
        });
    }
}
