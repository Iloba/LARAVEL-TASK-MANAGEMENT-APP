<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProjectController extends Controller
{
    //get all user project
     public function getAllProjects(){
        //get user id
        $userId = Auth::user()->id;
        //get all projects
        $projects = User::find($userId)->projects()->paginate(10);


        //get all tasks related to projects
        $tasks = Project::find(10)->tasks;
       
        return view('pages.projects', [
            'projects' => $projects,
            'tasks' => $tasks
        ]);
    }

   

}
