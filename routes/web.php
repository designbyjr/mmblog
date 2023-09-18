<?php

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

Route::get('/{sort?}', function () {
   return view('welcome');
//    $model = new \App\Models\ImportBlog;
//    $model->get();
//    $model = new \App\Services\ImportService();
//    $model->run();
});

Auth::routes();

Route::get('/home/{sort?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
