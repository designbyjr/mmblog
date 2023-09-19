<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//POST METHODS SORTING
Route::post('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/read/{model}/{id}', [App\Http\Controllers\PostsController::class, 'read'])->name('read_post');
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashIndex'])->name('dashboard');
    //POST METHOD
    Route::post('/dashboard', [App\Http\Controllers\HomeController::class, 'dashIndex'])->name('dashboard');

    Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'index'])->name('post_form');
    Route::post('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create_post');
});


