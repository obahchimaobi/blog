<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/', [HomeController::class, 'getAll'])->name('blog.home');
Route::get('title', [TitleController::class, 'title'])->name('blog.title');

// admin routes
Route::get('admin', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/register', [AdminController::class, 'register'])->name('admin.register');

Route::post('admin/login', [AdminController::class, 'admin_login'])->name('adminLogin');

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/fetch-blog', [ApiController::class, 'get_blog'])->name('blog.fetch');
});
