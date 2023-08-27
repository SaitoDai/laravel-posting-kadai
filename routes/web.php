<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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


Route::get('/posts', [PostController::class, 'unkox'])->name('undex');


Route::get('/posts/create', [PostController::class, 'uncreate'])->name('uncreate');


Route::post('posts', [PostController::class, 'store'])->name('unstore');


Route::get('/posts/{post}', [Postcontroller::class, 'unshow'])->name('unkoshow');


Route::get('posts/{post}/edit', [PostController::class, 'unedit'])->name('unkoedit');


Route::patch('/posts/{post}', [PostController::class, 'update'])->name('update');


Route::delete('/posts/{post}', [PostController::class, 'unkodestroy'])->name('undesu');


