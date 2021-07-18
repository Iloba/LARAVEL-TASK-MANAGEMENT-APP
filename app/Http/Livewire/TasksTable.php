<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TasksTable extends Component
{


    public function render()
    {
        //fetch tasks again
        $userId = Auth::user()->id;

         $tasks = User::find($userId)->tasks()->orderBy('priority')->get();


        return view('livewire.tasks-table', compact('tasks'));
    }


    //update task order
    public function updateTaskOrder($tasks){
        // dd($tasks);
        foreach($tasks as $task){
            $get_task = Task::find($task['value']);
            $get_task->priority = $task['order'];
            $get_task->save();
            
        }
    }
}
