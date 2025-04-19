<?php

use App\Http\Controllers\Cms\CategoryController;
use App\Http\Controllers\Cms\ConfigController;
use App\Http\Controllers\Cms\PostController;
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
        Route::resource('/post', PostController::class);
        Route::resource('/categories', CategoryController::class);

        // Users
        Route::resource('/users',UserController::class);

        // Config
        Route::get('/config', [ConfigController::class, 'edit'])->name('config.edit');
        Route::put('/config', [ConfigController::class, 'update'])->name('config.update');
    });

});

require __DIR__.'/auth.php';
