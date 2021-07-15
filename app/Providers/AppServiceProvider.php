<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\UserProjectController;


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
        //use bootstrap
        Paginator::usebootstrap();



         //get user id
        //  $userId = Auth::user()->id;
         //get all projects
     
 
 

        $projects = User::find(1)->projects()->get();
       
        //share data to all views
        View::share('projects', $projects);
    
    }
}
