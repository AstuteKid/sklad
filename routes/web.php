<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SkladController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store'])->name('user.store');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');
});

Route::middleware('auth')->group(function () {
    Route::get('sklad', [SkladController::class, 'index'])->name('sklad');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'categories'], function () {
            /*Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
            Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('category.create');
            Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('category.store');
            Route::get('/{category}/show', \App\Http\Controllers\Category\ShowController::class)->name('category.show');
            Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('category.edit');
            Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('category.update');
            Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('category.delete');
            Route::get('/trashed', \App\Http\Controllers\Category\TrashedController::class)->name('category.trashed');
            Route::get('/{category}/restore', \App\Http\Controllers\Category\RestoreController::class)->name('category.restore');
            Route::delete('/{category}/force_delete', \App\Http\Controllers\Category\ForceDeleteController::class)->name('category.force_delete');*/
        });
    });

});

