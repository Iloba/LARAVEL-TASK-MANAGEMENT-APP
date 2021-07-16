<?php

namespace App\Http\View\Composers;



use App\Models\User;
use App\Models\Project;
use Illuminate\View\View;


class TasksComposer
{
  

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {

        
        $tasks = Project::find(1)->tasks;

        //pass data to app service provider
        $view->with('tasks', $tasks);
    }

    public function tt(){
        return 'hello';
    }
}