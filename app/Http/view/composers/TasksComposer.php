<?php

namespace App\Http\View\Composers;



use App\Models\User;
use App\Models\Project;
use Illuminate\View\View;
use App\Http\Controllers\TaskController;


class TasksComposer extends TaskController
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {

        //Instantiate imported TaskController class
        // $task = new TaskController;

        //Access getAllData() Method on the imported class
        // $tasks = $task->getAllData();
       

        //pass data to app service provider
        // $view->with('tasks', $tasks);
    }

    // public function tt(){
     
    // }
}