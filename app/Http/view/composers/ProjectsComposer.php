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
        $user = Auth::user()->id;
        $view->with('projects', User::find($user)->projects()->get());
    }
}