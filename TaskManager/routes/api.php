<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTaskController;
use App\Http\Controllers\ApiUserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//get method route to task controller
Route::get('/tasks/{id}', [ApiTaskController::class, 'show']);
Route::post('/tasks/create/', [ApiTaskController::class, 'store']);
Route::put('/tasks/update/{id}', [ApiTaskController::class, 'update']);
Route::delete('/tasks/delete/{id}', [ApiTaskController::class, 'destroy']);

//methods for user
Route::post('/users/login/', [ApiUserController::class, 'login']);
Route::post('/users/create/', [ApiUserController::class, 'store']);
