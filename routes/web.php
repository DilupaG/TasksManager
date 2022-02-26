<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

//load home
Route::get('/home', function () {
    
    //when we load the home page(rather than after adding task) we have to view home page with tasks list of db
    $allTasks = App\Models\Task::all(); 
    return view('home')->with('tasks',$allTasks); 
});

//load calander by using function call of a controller class
Route::get('/calander', [FrontendController::class,'loadc']);    //if use this method we have to import the class first

//load add tasks page
Route::get('/addTask', function () {
    return view('addTask');
});

//add task form sumbmition and export data to db
Route::post('/exporttask', [TaskController::class,'exportTask']); 

//update task status to onGoing(start task)
Route::get('/updateTask/{id}', [TaskController::class,'updateTask']); 

//update task status to completed
Route::get('/completedTask/{id}', [TaskController::class,'completed']); 

//delete task
Route::get('/deleteTask/{id}', [TaskController::class,'delete']); 
