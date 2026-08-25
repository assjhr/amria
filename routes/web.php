<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('admin')
        ->name('admin.')
        ->middleware('admin')
        ->group(function () {
            Route::get('/', [AdminController::class, 'index'])
                ->name('dashboard');

            Route::get('/users', [UserController::class, 'index'])
                ->name('users.index');
        });
});

require __DIR__.'/settings.php';