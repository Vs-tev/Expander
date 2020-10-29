<?php

namespace App\Providers;


use App\Project;

use App\Http\View\Composers\DropdownsComposer;

use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //option 1
        //View::share('progress', $progress);
       

        //option 2
        /*
       'project.*' ->for all files in project folder
        View::composer(['project.show','project.create'], function($view){
            $progress = [
                'edno',
                'dve', 
                'tri'
            ];
            $view->with('progress', $progress);
        });
        */

        //call option 3 (app/http/view/composer)
        View::composer(['project.*', 'layouts.modal_profil'], DropdownsComposer::class);

    }
}
