<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email', [AuthController::class, 'verifyNotice'])->middleware('auth')->name('verification.notice');
Route::get('verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('resend-verify-email', [AuthController::class, 'resendVerifyEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::match(['get', 'post'], '/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::match(['get', 'post'], '/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users.all');
         Route::post('/users', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('EditUser');
         Route::get('/users/{id}', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('EditUserAjax');
    });
    Route::get('/boards', [\App\Http\Controllers\BoardsController::class, 'boards'])->name('boards');
});
