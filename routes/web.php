<?php

use App\Livewire\Authenticator;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Beranda;
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

Route::get('/', Beranda::class)->name('home')->middleware('auth');

// Authenticator
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', [Authenticator::class, 'logout'])->middleware('auth');
