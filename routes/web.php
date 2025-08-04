<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use JeroenNoten\LaravelAdminLte\Http\Controllers\DarkModeController;
use App\Http\Controllers\Admin\BlogCategoryController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.listing');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.detail');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('settings', [SettingController::class, 'edit_settings'])->name('admin.settings.edit');
    Route::post('settings', [SettingController::class, 'update_settings'])->name('admin.settings.update');

    // Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);
    // Route::post('menus/{menu}/toggle-status', [\App\Http\Controllers\Admin\MenuController::class, 'toggleStatus'])->name('menus.toggleStatus');

    Route::get('menus/sort', [\App\Http\Controllers\Admin\MenuController::class, 'sort'])->name('menus.sort');
    Route::post('menus/update-order', [\App\Http\Controllers\Admin\MenuController::class, 'updateOrder'])->name('menus.updateOrder');



    // Page CRUD routes
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::resource('blog-categories', BlogCategoryController::class);
});

require __DIR__ . '/auth.php';

Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'show'])->name('page.show');
