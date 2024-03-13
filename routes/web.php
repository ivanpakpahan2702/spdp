<?php

use App\Http\Controllers\Email\EmailVerifyController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Register;
use App\Livewire\Beranda;
use App\Livewire\Pass\ForgotPass;
use App\Livewire\Profile\Setting;
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

Route::get('/', Beranda::class)->name('home')->middleware(['auth', 'verified']);

// Authenticator
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', [Logout::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/login_forced', [Logout::class, 'login_forced'])->middleware('auth');

// Email Verify
Route::get('/email/verify', [EmailVerifyController::class, 'index'])->middleware('auth')->name('verification.notice');
Route::post('/email/verification-notification', [EmailVerifyController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'handle'])->middleware(['auth', 'signed'])->name('verification.verify');

// Forgot Password
Route::get('/forgot-password', [ForgotPass::class, 'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPass::class, 'sending'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [ForgotPass::class, 'handle'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ForgotPass::class, 'update'])->middleware('guest')->name('password.update');

// Profile
Route::get('/pengaturan-akun', Setting::class)->name('settings')->middleware('auth');
