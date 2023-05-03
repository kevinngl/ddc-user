<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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
Route::group(['domain' => ''], function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('list', [HomeController::class, 'list'])->name('list');
    Route::get('single/{single}', [HomeController::class, 'single'])->name('single');
    Route::get('signup', [HomeController::class, 'signup'])->name('signup');
    Route::get('signin', [HomeController::class, 'signin'])->name('signin');

    Route::post('login', [AuthController::class, 'do_login'])->name('login');
    Route::post('register', [AuthController::class, 'do_register'])->name('register');
    Route::get('forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('forgot-password');
    Route::post('send-email', [AuthController::class, 'sendResetLinkEmail'])->name('send-email');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::get('resetPage', [AuthController::class, 'resetPage'])->name('resetPage');
    Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

    Route::middleware(['auth'])->group(function () {
        Route::get('profilUser', [HomeController::class, 'profilUser'])->name('profilUser');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
        Route::get('payment/{payment}', [TransactionController::class, 'index'])->name('payment');
    });
});