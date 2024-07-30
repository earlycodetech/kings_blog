<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [PagesController::class, 'home_page'])->name('home.page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('post/create', [PostController::class, 'create'])->name('post.create');
Route::post('post/create', [PostController::class, 'store'])->name('post.store');

Route::get('posts', [PostController::class, 'index'])->name('post.index');

Route::get('post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::patch('post/{id}/edit', [PostController::class, 'update'])->name('post.update');


