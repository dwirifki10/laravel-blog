<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;

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
Route::get('/show/{id}', function () {
    return view('show');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/post', [HomeController::class, 'post'])->name('post');
Route::get('/table', [HomeController::class, 'table'])->name('table');
Route::get('/post/{id}', [HomeController::class, 'show'])->name('show');

Route::post('/post/create', [PostController::class, 'store'])->name('create');
Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('delete');
Route::post('/post/create/{id}', [PostController::class, 'update'])->name('update');

Route::post('/status', [UserController::class, 'update'])->name('status');
