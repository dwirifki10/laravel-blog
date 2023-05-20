<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Umum\PublicController;

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

Route::get('/', [PublicController::class, 'index'])->name('public');
Route::get('/show/{id}', [PublicController::class, 'show'])->name('detail');
Route::post('/comment/{id}', [PublicController::class, 'comment'])->name('comment');
Route::post('/star', [PublicController::class, 'star'])->name('star');
Route::get('/category/{id}', [PublicController::class, 'category'])->name('category');

Route::resource('/admin', AdminController::class);
Route::get("/login/admin", function() {
    return view("dashboard.authentication.login");
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
