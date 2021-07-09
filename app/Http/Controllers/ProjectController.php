<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //create project
    public function create(Request $request){
        
        //Validate Request
        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required'
        ]);

        //create project based on user
        $request->user()->projects()->create([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description
        ]);

        //Redirect back with message
        return redirect()->back()->with('success', 'Project Created Succcessfully');
    }


   
}
