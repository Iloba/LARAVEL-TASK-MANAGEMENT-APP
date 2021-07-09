<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //create task
    public function create(Request $request, $id, Project $project){
        //Validate
        $request->validate([
            'task_name' => 'required',
            'task_priority' => 'required'
        ]);

        $projectId = Project::find($id);

         //Create Task
         $task = new Task;
         $task->task_name = $request->task_name;
         $task->priority = $request->task_priority;
         $task->project_id = $projectId->id;

         $task->save();

         //redirect
         return back()->with('success', 'Task added successfully');
    }

    //get all tasks
    public function getAll(){
        $tasks = Project::find(5)->tasks;

        return view('pages.tasks', [
            'tasks' => $tasks
        ]);
      
    }
}
