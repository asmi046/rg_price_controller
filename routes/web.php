<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\AuthController;

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






Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, "logout"])->name("logout");
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show_login_page'])->name('login');
    Route::post('/login_do', [AuthController::class, "login"])->name("login_do");


});
