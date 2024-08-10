<?php

use App\Http\Controllers\SkladController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('register', [UserController::class, 'create'])->name('register');
Route::post('register', [UserController::class, 'store'])->name('user.store');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'loginAuth'])->name('login.auth');

Route::middleware('auth')->group(function () {
    Route::get('sklad', [SkladController::class, 'index'])->name('sklad');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});

