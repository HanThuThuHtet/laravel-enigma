<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//blog
Route::get('/',[BlogController::class,'index']);
Route::get('/blogs/{blog:slug}',[BlogController::class,'show']);

//register
Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'store'])->middleware('guest');


//login
Route::get('/login', [AuthController::class,'login'])->middleware('guest');
Route::post('/login',[AuthController::class,'check'])->middleware('guest');

//logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');

//comment
Route::post('/blogs/{blog:slug}/comments',[CommentController::class,'store'])->middleware('auth');
