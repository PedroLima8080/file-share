<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::name('file')->prefix('file')->group(function() {
        Route::get('/create', [FileController::class, 'create'])->name('.create');
        Route::get('/edit/{id}', [FileController::class, 'edit'])->name('.edit');
        Route::post('/store', [FileController::class, 'store'])->name('.store');
        Route::put('/update/{id}', [FileController::class, 'update'])->name('.update');
        Route::delete('/delete/{id}', [FileController::class, 'destroy'])->name('.destroy');
        Route::get('/download/{id}', [FileController::class, 'downloadPrivateFile'])->name('.download');
    });
});
