<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cms\PostController;
use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Cms\UserController;
use App\Http\Controllers\Cms\ConfigController;
use App\Http\Controllers\Cms\LandingController;
use App\Http\Controllers\Cms\CategoryController;
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Cms\PageController as CmsPageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Route khusus untuk contact form
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('cms')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Post
        // Route::resource('/post', PostController::class)->middleware('permission:Posts Show|Posts Create');
        Route::get('/post', [PostController::class, 'index'])->name('post.index')->middleware('permission:Posts Show');
        Route::get('/post/create', [PostController::class, 'create'])->name('post.create')->middleware('permission:Posts Create');
        Route::post('/post', [PostController::class, 'store'])->name('post.store');
        Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('permission:Posts Edit');
        Route::put('/post/{post}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
        Route::post('/post/upload', [PostController::class, 'upload'])->name('post.upload');

        // Pages
        Route::resource('/pages', CmsPageController::class)->middleware('permission:Pages Show|Pages Create|Pages Edit|Pages Delete');

        // Landing
        Route::get('/landing', [LandingController::class, 'edit'])->name('landing.edit')->middleware('permission:Landing Show');
        Route::put('/landing', [LandingController::class, 'update'])->name('landing.update');

        // Categories
        Route::resource('/categories', CategoryController::class)->middleware('permission:Category Show');

        // Users
        Route::resource('/users', UserController::class)->middleware('permission:User Show|User Create|User Edit|User Detail|User Delete');

        // Config
        Route::get('/config', [ConfigController::class, 'edit'])->name('config.edit')->middleware('permission:Config Show');
        Route::put('/config', [ConfigController::class, 'update'])->name('config.update');

        // Roles
        Route::resource('/roles', RoleController::class)->middleware('permission:Role Show');
    });
});

require __DIR__ . '/auth.php';

// Route dinamis untuk semua page lain

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');