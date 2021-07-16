<?php

namespace App\Http\View\Composers;


use auth;
use App\Models\User;
use Illuminate\View\View;


class ProjectsComposer
{
  

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {

        //get user id
        $user = Auth::user()->id;
        $projects = User::find($user)->projects()->get();

        //pass data to app service provider
        $view->with('projects', $projects);
    }
}