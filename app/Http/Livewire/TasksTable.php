<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TasksTable extends Component
{

    public $tasks;

    public function render()
    {
        //fetch tasks again
        $userId = Auth::user()->id;

        $tasks = User::find($userId)->tasks()->orderBy('created_at')->get();


        return view('livewire.tasks-table', compact('tasks'));
    }


    //update task order
    public function updateTaskOrder($tasks){
     
        foreach($tasks as $task){
            Task::find($task['value'])->update(['priority' => $task['order']]);
        }
    }
}
