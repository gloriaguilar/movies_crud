<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatformController;

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

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-user', [AuthController::class, 'registerUser']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login-user', [AuthController::class, 'loginUser']);


Route::middleware('isLogged')->group(function (){
    
Route::get('/', [MovieController::class, 'index']);

Route::get('platform-list',[PlatformController::class, 'index']);
Route::get('platform-add',[PlatformController::class, 'add']);
Route::post('platform-save',[PlatformController::class, 'save']);
Route::get('platform-edit/{id}',[PlatformController::class, 'edit']);
Route::post('platform-update',[PlatformController::class, 'update']);
Route::get('platform-delete/{id}',[PlatformController::class, 'delete']);

Route::get('movie-list',[MovieController::class, 'index']);
Route::get('movie-add',[MovieController::class, 'add']);
Route::post('movie-save',[MovieController::class, 'save']);
Route::get('movie-edit/{id}',[MovieController::class, 'edit']);
Route::post('movie-update',[MovieController::class, 'update']);
Route::get('movie-delete/{id}',[MovieController::class, 'delete']);

Route::get('category-list',[CategoryController::class, 'index']);
Route::get('category-add',[CategoryController::class, 'add']);
Route::post('category-save',[CategoryController::class, 'save']);
Route::get('category-edit/{id}',[CategoryController::class, 'edit']);
Route::post('category-update',[CategoryController::class, 'update']);
Route::get('category-delete/{id}',[CategoryController::class, 'delete']);

Route::get('logout', [AuthController::class, 'logout']);
});