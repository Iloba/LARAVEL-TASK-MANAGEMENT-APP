<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserProjectController;
use App\Http\view\composers\TasksComposer;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//Create Project
Route::post('/home', [ProjectController::class, 'create'])->name('create_project');


//Prefix all other routes
Route::group(['prefix' => '/home', 'middleware' => 'auth'], function(){

     //All projects
     Route::get('/projects', [UserProjectController::class, 'getAllProjects'])->name('allprojects');

     //Show Projects
     Route::get('/project/{id}', [ProjectController::class, 'show_project'])->name('show_project');
 
     //Add task to  projects
     Route::post('/project/{id}/task', [TaskController::class, 'create'])->name('add_task');
 
     //get tasks 
     Route::get('/tasks', [TaskController::class, 'getAll'])->name('alltasks');
 
     //Edit Task
     Route::get('/tasks/{id}/edit', [TaskController::class, 'editTask'])->name('edit_task');
 
     //Update Task
     Route::put('/tasks/{id}/update', [TaskController::class, 'update'])->name('update_task');
 
     //Delete Task
     Route::delete('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('delete_task');
 
     // //get tasks from projects dropdown
     Route::post('projects/{id}/tasks', [ProjectController::class, 'getTasks'])->name('getTasks');
 
     //Edit Project
     Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('edit_project');
 
     //Update Project
     Route::put('/projects/{id}/update', [ProjectController::class, 'update'])->name('update_project');
 
     //Delete Project
     Route::delete('/projects/{id}/delete', [ProjectController::class, 'delete'])->name('delete_project');
 

});

   







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

