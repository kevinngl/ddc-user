<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
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
    Route::get('home', [CampaignController::class, 'index'])->name('home');
    Route::get('faq', [CampaignController::class, 'faq'])->name('faq');
    Route::get('list', [CampaignController::class, 'list'])->name('list');
    Route::get('single/{id}', [CampaignController::class, 'detail'])->name('single');

    Route::middleware(['guest'])->group(function () { 
        Route::get('signin', [AuthController::class, 'signin'])->name('signin');
        Route::post('login', [AuthController::class, 'do_login'])->name('login');
        Route::post('register', [AuthController::class, 'do_register'])->name('register');
    });

    Route::middleware(['checkAuthToken'])->group(function () {
        // Add protected routes here
        Route::get('profile', [UserController::class, 'getUserData'])->name('profile');
        Route::get('donate/{id}', [DonationController::class, 'index'])->name('donate');
        Route::post('payment/{id}', [DonationController::class, 'store'])->name('payment');
        Route::get('logout', [AuthController::class, 'do_logout'])->name('logout');
        Route::get('success', [DonationController::class, 'do_success'])->name('success');
    });

    
    Route::get('forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('forgot-password');
    Route::post('send-email', [AuthController::class, 'sendResetLinkEmail'])->name('send-email');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::get('resetPage', [AuthController::class, 'resetPage'])->name('resetPage');
    Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
