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
Route::prefix('/home')->group(function(){

    //All projects
    Route::get('/projects', [UserProjectController::class, 'getAllProjects'])->name('allprojects')->middleware('auth');

    //Show Projects
    Route::get('/project/{id}', [ProjectController::class, 'show_project'])->name('show_project')->middleware('auth');

    //Add task to  projects
    Route::post('/project/{id}/task', [TaskController::class, 'create'])->name('add_task')->middleware('auth');

    //get tasks 
    Route::get('/tasks', [TaskController::class, 'getAll'])->name('alltasks')->middleware('auth');

    //Edit Task
    Route::get('/tasks/{id}/edit', [TaskController::class, 'editTask'])->name('edit_task')->middleware('auth');

    //Update Task
    Route::put('/tasks/{id}/update', [TaskController::class, 'update'])->name('update_task')->middleware('auth');

    //Delete Task
    Route::delete('/tasks/{id}/delete', [TaskController::class, 'delete'])->name('delete_task')->middleware('auth');

    //get tasks from projects dropdown
    Route::post('/{id}', [TasksComposer::class, 'tt'])->name('getdata')->middleware('auth');

    //Edit Project
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('edit_project')->middleware('auth');

    //Update Project
    Route::put('/projects/{id}/update', [ProjectController::class, 'update'])->name('update_project')->middleware('auth');


});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

