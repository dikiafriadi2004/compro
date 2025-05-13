<?php

use App\Http\Controllers\Cms\CategoryController;
use App\Http\Controllers\Cms\ConfigController;
use App\Http\Controllers\Cms\PostController;
use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Cms\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('cms.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('cms')->group(function(){
        // Post
        // Route::resource('/post', PostController::class)->middleware('permission:Posts Show|Posts Create');
        Route::get('/post', [PostController::class, 'index'])->name('post.index')->middleware('permission:Posts Show');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('permission:Posts Create');
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('permission:Posts Edit');
        Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

        // Categories
        Route::resource('/categories', CategoryController::class)->middleware('permission:Category Show');

        // Users
        Route::resource('/users',UserController::class);

        // Config
        Route::get('/config', [ConfigController::class, 'edit'])->name('config.edit');
        Route::put('/config', [ConfigController::class, 'update'])->name('config.update');

        // Roles
        Route::resource('/roles', RoleController::class);
    });

});

require __DIR__.'/auth.php';
