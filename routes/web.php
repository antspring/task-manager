<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use \App\Http\Controllers\TaskController;

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

Route::middleware('auth')->group(function (){

    Route::get('/',function () {
        return redirect()->route('personal-area');
    });

    Route::get('/personal-area', [HomeController::class, 'personalArea'])->name('personal-area');

    Route::post('/create-group', [GroupController::class, 'createGroup'])->name('create-group');

    Route::get('/get-task', [TaskController::class, 'getTask'])->name('get-task');

    Route::put('/update-task', [TaskController::class, 'updateTask'])->name('update-task');

    Route::post('/change-status', [TaskController::class, 'changeStatus'])->name('change-status');

    Route::delete('/delete-task', [TaskController::class, 'deleteTask'])->name('delete-task');

    Route::get('/project/{id}', [HomeController::class, 'index'])->name('project');

    Route::post('/create-task', [TaskController::class, 'createTask'])->name('create-task');

    Route::get('/search-group-users',[TaskController::class,'searchGroupUsers'])->name('search.group.users');

    Route::get('/search-all-users',[GroupController::class,'searchUsers'])->name("search.all.users");

    Route::post("/add-user",[GroupController::class,'addUserToProject'])->name("addUser");

    Route::get('/search-tasks', [TaskController::class, 'searchTasks'])->name('search-tasks');
});
