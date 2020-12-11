<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class , 'index']);
Route::get('/admin', [AdminController::class , 'index']);
Route::get('/admin/post', [AdminController::class , 'post']);
Route::get('/admin/login', [AdminController::class , 'login']);
Route::get('/admin/logout', [AdminController::class , 'logout']);
Route::post('/handlecomment', [HomeController::class , 'handlecomment']);
Route::post('/admin/handlelogin', [AdminController::class , 'handlelogin']);
Route::post('/admin/handleedit', [AdminController::class , 'handleedit']);
Route::get('/admin/handledelete/{id}', [AdminController::class , 'handledelete']);
Route::post('/admin/create', [AdminController::class , 'insert']);
Route::get('/admin/list', [AdminController::class , 'list']);
Route::get('/admin/edit/{id}', [AdminController::class , 'edit']);
Route::get('/admin/delete/{id}', [AdminController::class , 'delete']);
Route::get('/post/{id}', [HomeController::class, 'show']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
