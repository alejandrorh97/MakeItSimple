<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //error_log(Auth::user()->role);
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
    //Route::get('tasks/{id}', [TaskController::class, 'index'])->name('tasks.index');
    //Route::get('tasks/create/{id}', [TaskController::class, 'create'])->name('tasks.create');
});
