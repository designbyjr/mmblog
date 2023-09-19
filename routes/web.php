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

Route::get('/', function () {
   return view('welcome');
//    $model = new \App\Models\ImportBlog;
//        dd($model::find(1)->user);
//    $model = new \App\Services\ImportService();
//    $model->run();
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'index'])->name('post_form');
    Route::post('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create_post');
});


