<?php

use App\Http\Controllers\AdminBlogController;
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

//subscription
Route::post('/blogs/{blog:slug}/subscription',[BlogController::class,'subscriptionHandler']);


//Admin Managment
//create blog
Route::get('/admin/blogs/create',[AdminBlogController::class,'create'])->middleware('admin');

//store blog
Route::post('/admin/blogs/store',[AdminBlogController::class,'store'])->middleware('admin');

//delete blog
Route::delete('/admin/blogs/{blog:slug}/delete',[AdminBlogController::class,'destroy'])->middleware('admin');

//edit blog
Route::get('/admin/blogs/{blog:slug}/edit',[AdminBlogController::class,'edit'])->middleware('admin');

//dashboard
Route::get('/admin/blogs',[AdminBlogController::class,'index'])->middleware('admin');
