<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/register',[UserController::class,'register_index']);
Route::post('/register',[UserController::class,'register']);
Route::get('/login',[UserController::class,'login_index']);
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/tasks/create',[TaskController::class, 'create'])->middleware('auth');
Route::post('/tasks/create',[TaskController::class, 'store'])->middleware('auth');;
Route::get('/tasks',[TaskController::class,'index'])->middleware('auth');
Route::get('/tasks/edit/{id}',[TaskController::class,'edit']);
Route::put('/tasks/edit/{id}',[TaskController::class,'update']);
Route::delete('/tasks/delete/{id}',[TaskController::class,'delete']);
