<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [\App\Http\Controllers\Auth\SessionController::class, 'create'])->name('session.create');
Route::post('/login', [\App\Http\Controllers\Auth\SessionController::class, 'store'])->name('session.store');
Route::get('/logout', [\App\Http\Controllers\Auth\SessionController::class, 'destroy'])->name('session.destroy');

Route::get('/load-data', [\App\Http\Controllers\MatchesController::class, 'loadDataFromApi'])->name('matches.load');
Route::get('/withdraw-approval', [\App\Http\Controllers\WithdrawApprovalController::class, 'index'])->name('withdraw_approval.index');
