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

    Route::get('/personal-area', [HomeController::class, 'personalArea'])->name('personal-area');

    Route::post('/create-group', [GroupController::class, 'createGroup'])->name('create-group');

    Route::get('/project/{id}', [HomeController::class, 'index'])->name('project');

    Route::post('/create-task', [TaskController::class, 'createTask'])->name('create-task');
});
