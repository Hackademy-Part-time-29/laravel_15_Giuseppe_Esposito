<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ArticleController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::resource('articles', ArticleController::class);

Route::resource('tags', TagController::class);