<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('login' , [UserController::class , 'login']);
Route::post('logout' , [UserController::class , 'logout'])->middleware('auth:api');


Route::group(['prefix' => 'users'] , function () {
    Route::get('all' , [UserController::class , 'index']);
    Route::get('{id}/show' , [UserController::class , 'show']);
    Route::post('/' , [UserController::class , 'store']);
    Route::put('{id}/update' , [UserController::class , 'update']);
    Route::delete('{id}/delete' , [UserController::class , 'delete']);
});


Route::group(['prefix' => 'post', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [PostController::class, 'index']);           // GET    /post
    Route::get('create', [PostController::class, 'create']);     // GET    /post/create
    Route::post('/', [PostController::class, 'store']);          // POST   /post
    Route::get('{id}', [PostController::class, 'show']);         // GET    /post/{id}
    Route::get('{id}/edit', [PostController::class, 'edit']);    // GET    /post/{id}/edit
    Route::put('{id}', [PostController::class, 'update']);       // PUT    /post/{id}
    Route::delete('{id}', [PostController::class, 'destroy']);   // DELETE /post/{id}
});
