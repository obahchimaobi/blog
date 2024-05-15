<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('title', [TitleController::class, 'title'])->name('blog.title');
