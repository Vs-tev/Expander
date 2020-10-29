<?php

namespace App\Providers;

use App\Apply;

use App\Apply_body;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class ApplyServiceProvider extends ServiceProvider
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
        View::composer('layouts.navbar', function($view){

            $view->with('recievedApply', Apply::all_recievedApply());
           
            //dd($view);
        });

        View::composer(['layouts.navbar', 'apply.myapplyings'], function($view){
            $view->with('myapplyings', Apply::my_apply());
        });
    }
}
