<?php

use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group([
        'prefix' => 'post',
        'as' => 'post.',
     ], function () {
         Route::get('/', [PostController::class, 'index'])->name('index');
         Route::get('/create', [PostController::class, 'create'])->name('create');
         Route::post('/store/{user}', [PostController::class, 'store'])->name('store');
         Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');
         Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
         Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('destroy');
     });

     Route::group([
        'prefix' => 'category',
        'as' => 'category.',
     ], function () {
         Route::get('/', [PostCategoryController::class, 'index'])->name('index');
         Route::get('/create', [PostCategoryController::class, 'create'])->name('create');
         Route::post('/store/{user}', [PostCategoryController::class, 'store'])->name('store');
         Route::get('/{postCategory}/edit', [PostCategoryController::class, 'edit'])->name('edit');
         Route::put('/update/{postCategory}', [PostCategoryController::class, 'update'])->name('update');
         Route::delete('/delete/{postCategory}', [PostCategoryController::class, 'destroy'])->name('destroy');
     });
});



require __DIR__.'/auth.php';
