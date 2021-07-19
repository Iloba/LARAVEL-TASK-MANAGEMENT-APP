<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;

class ProjectController extends Controller
{
    //create project
    public function create(Request $request){
        
        //Validate Request
        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required'
        ]);

        //create project based on user relationship
        $request->user()->projects()->create([
            'project_name' => $request->project_name,
            'project_description' => $request->project_description
        ]);

        //Redirect back with message
        return redirect()->route('allprojects')->with('success', 'Project Created Succcessfully');
    }


    


    //Show Project
    public function show_project($id){
        $project = Project::find($id);
    

        //get all tasks related to project
        $tasks = Project::find($id)->tasks;

        //return view with tasks
        return view('pages.project_page', [
            'project' => $project,
            'tasks' => $tasks
            
        ]);
    }


    //get tasks under project and display from dropdown
    public function getTasks(Request $request){
        //get tasks using relationship
        $tasks = Project::find($request->project_id)->tasks;

        //return view with tasks
        return view('pages.dropdown_tasks', [
            'tasks' => $tasks
        ]);
    }



    

    //edit Project
    public function edit($id){
        $project = Project::find($id);

        return view('pages.edit_project',[
            'project' => $project
        ]);
    }

    //Update Project
    public function update(Request $request, $id){
        //Validate form request
        $request->validate([
            'project_name' => 'required',
            'project_description' => 'required'
        ]);

        //Update
        $project = Project::find($id);
        $project->project_name = is_null($request->project_name) ? $project->project_name : $request->project_name;
        $project->project_description = is_null($request->project_description) ? $project->project_description : $request->project_description;
        $project->save();


        //Redirect back with message
        return redirect()->route('allprojects')->with('success', 'Project Updated Succcessfully');

       

    }

    public function delete($id){
        //find project by ID
        $project = Project::find($id);

        //delete project
        $project->delete();

        //Redirect back with message
        return redirect()->route('allprojects')->with('success', 'Project Deleted Succcessfully');
    }
   
}
