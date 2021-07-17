<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
         $task->user_id = Auth::user()->id;

         $task->save();

         //redirect
         return back()->with('success', 'Task added successfully');
    }

    //get all tasks by project relationship
    public function getAll(){

        $userId = Auth::user()->id;

        $tasks = User::find($userId)->tasks;

        return view('pages.tasks', [
            'tasks' => $tasks
        ]);
      
    }

    //Edit task
    public function editTask($id){
        $task = Task::find($id);

       

        return view('pages.edit_task', [
            'task' => $task
        ]);
    }

    //Update Task
    public function update(Request $request, $id){
        $task = Task::find($id);

        $task->task_name = is_null($request->task_name) ? $task->task_name : $request->task_name;
        $task->priority = is_null($request->task_priority) ? $task->priority : $request->task_priority;
        $task->save();

        //redirect back
        return redirect()->route('alltasks')->with('success', 'Task successfully Updated');
      
    }

    public function delete($id){
        $task = Task::find($id);
        
        //reorder tasks when deleted
        Task::where('priority', '>', $task->priority)->update(
            ['priority' => \DB::raw('priority - 1')]
        );

        $task->delete();

        

        //redirect back
        return redirect()->route('alltasks')->with('success', 'Task successfully Deleted');
    }
}
