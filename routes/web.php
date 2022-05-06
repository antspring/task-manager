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

    Route::put('/update-task', [TaskController::class, 'UpdateTask'])->name('update-task');

    Route::delete('/delete-task', [TaskController::class, 'deleteTask'])->name('delete-task');

    Route::get('/project/{id}', [HomeController::class, 'index'])->name('project');

    Route::post('/create-task', [TaskController::class, 'createTask'])->name('create-task');

    Route::get('/search-users',[TaskController::class,'searchUsers'])->name('search.users');
});
