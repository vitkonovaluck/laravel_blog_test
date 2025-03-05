<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CategorysController::class, 'index'])->name('index');
Route::get('/category/{id}', [CategorysController::class, 'show'])->name('category.show');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
Route::post('/', [CategorysController::class, 'search'])->name('search');

Route::post('/post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posts', PostController::class);
});
Auth::routes();
