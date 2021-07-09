<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserProjectController;

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
Route::get('/projects', [UserProjectController::class, 'getAllProjects'])->name('allprojects');

//Show Projects
Route::get('/project/{id}', [ProjectController::class, 'show_project'])->name('show_project');

//Add task to  projects
Route::post('/project/{id}/task', [TaskController::class, 'create'])->name('add_task');

//get tasks 
Route::get('/tasks', [TaskController::class, 'getAll'])->name('alltasks');



});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

