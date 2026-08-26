<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\NewsController;
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

            // News
            Route::get('/news', [NewsController::class, 'index'])
                ->name('news.index');

            Route::get('/news/create', [NewsController::class, 'create'])
                ->name('news.create');

            Route::post('/news', [NewsController::class, 'store'])
                ->name('news.store');

            Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
                ->name('news.edit');

            Route::put('/news/{news}', [NewsController::class, 'update'])
                ->name('news.update');

            Route::delete('/news/{news}', [NewsController::class, 'destroy'])
                ->name('news.destroy');

            // FAQ categories
            Route::get('/faq-categories', [FaqCategoryController::class, 'index'])
                ->name('faq-categories.index');

            Route::get('/faq-categories/create', [FaqCategoryController::class, 'create'])
                ->name('faq-categories.create');

            Route::post('/faq-categories', [FaqCategoryController::class, 'store'])
                ->name('faq-categories.store');

            Route::get('/faq-categories/{faqCategory}/edit', [FaqCategoryController::class, 'edit'])
                ->name('faq-categories.edit');

            Route::put('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'update'])
                ->name('faq-categories.update');

            Route::delete('/faq-categories/{faqCategory}', [FaqCategoryController::class, 'destroy'])
                ->name('faq-categories.destroy');

            // FAQs
            Route::get('/faqs', [FaqController::class, 'index'])
                ->name('faqs.index');

            Route::get('/faqs/create', [FaqController::class, 'create'])
                ->name('faqs.create');

            Route::post('/faqs', [FaqController::class, 'store'])
                ->name('faqs.store');

            Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])
                ->name('faqs.edit');

            Route::put('/faqs/{faq}', [FaqController::class, 'update'])
                ->name('faqs.update');

            Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])
                ->name('faqs.destroy');
        });
});

require __DIR__.'/settings.php';
