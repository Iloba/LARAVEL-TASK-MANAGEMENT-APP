<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\TasksComposer;
use App\Http\View\Composers\ProjectsComposer;



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
        //use bootstrap for pagination
        Paginator::usebootstrap();


        //pass data from the Http/Views/Composer/ProjectsComposer Class
        View::composer('home', ProjectsComposer::class);

        //pass data from the Http/Views/Composer/ProjectsComposer Class
        View::composer('home', TasksComposer::class);
    }
}
