<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProjectController extends Controller
{
    //get all user project
     public function getAllProjects(){
        //get user id
        $userId = Auth::user()->id;
        $projects = User::find($userId)->projects()->paginate(10);

       
        return view('pages.projects', [
            'projects' => $projects
        ]);
    }
}
