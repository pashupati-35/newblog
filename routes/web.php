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

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class,'homepage'])->name('frontend.home');
Route::get('/post/{slug}', [App\Http\Controllers\Frontend\HomeController::class,'postDetail'])->name('frontend.post_detail');
Route::post('/comment/{slug}', [App\Http\Controllers\Frontend\HomeController::class,'storeComment'])->name('frontend.post_comment');
Route::get('/comment', [App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.comment.index');
Route::delete('/comment/{id}', [App\Http\Controllers\Frontend\HomeController::class,'destroy'])->name('frontend.comment.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('backend/category/create',[App\Http\Controllers\Backend\CategoryController::class,'create'])->name('backend.category.create');
Route::post('backend/category/',[App\Http\Controllers\Backend\CategoryController::class,'store'])->name('backend.category.store');
Route::get('backend/category/',[App\Http\Controllers\Backend\CategoryController::class,'index'])->name('backend.category.index');
Route::get('backend/category/{id}',[App\Http\Controllers\Backend\CategoryController::class,'show'])->name('backend.category.show');
Route::delete('backend/category/{id}',[App\Http\Controllers\Backend\CategoryController::class,'destroy'])->name('backend.category.destroy');
Route::get('backend/category/{id}/edit',[App\Http\Controllers\Backend\CategoryController::class,'edit'])->name('backend.category.edit');
Route::put('backend/category/{id}',[App\Http\Controllers\Backend\CategoryController::class,'update'])->name('backend.category.update');

//tag
Route::get('backend/tag/create', [App\Http\Controllers\Backend\TagController::class, 'create'])->name('backend.tag.create');
Route::post('backend/tag/', [App\Http\Controllers\Backend\TagController::class, 'store'])->name('backend.tag.store');
Route::get('backend/tag/', [App\Http\Controllers\Backend\TagController::class, 'index'])->name('backend.tag.index');
Route::get('backend/tag/{id}', [App\Http\Controllers\Backend\TagController::class, 'show'])->name('backend.tag.show');
Route::delete('backend/tag/{id}', [App\Http\Controllers\Backend\TagController::class, 'destroy'])->name('backend.tag.destroy');
Route::get('backend/tag/{id}/edit', [App\Http\Controllers\Backend\TagController::class, 'edit'])->name('backend.tag.edit');
Route::put('backend/tag/{id}', [App\Http\Controllers\Backend\TagController::class, 'update'])->name('backend.tag.update');


Route::get('backend/post/create', [App\Http\Controllers\Backend\PostController::class, 'create'])->name('backend.post.create');
Route::post('backend/post/', [App\Http\Controllers\Backend\PostController::class, 'store'])->name('backend.post.store');
Route::get('backend/post/', [App\Http\Controllers\Backend\PostController::class, 'index'])->name('backend.post.index');
Route::get('backend/post/{id}', [App\Http\Controllers\Backend\PostController::class, 'show'])->name('backend.post.show');
Route::delete('backend/post/{id}', [App\Http\Controllers\Backend\PostController::class, 'destroy'])->name('backend.post.destroy');
Route::get('backend/post/{id}/edit', [App\Http\Controllers\Backend\PostController::class, 'edit'])->name('backend.post.edit');
Route::put('backend/post/{id}', [App\Http\Controllers\Backend\PostController::class, 'update'])->name('backend.post.update');
