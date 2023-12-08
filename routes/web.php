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

Route::get('/partials/chat', [App\Http\Controllers\PartialsController::class, 'chat'])->name('partials.chat');
Route::post('/partials/chat', [App\Http\Controllers\PartialsController::class, 'chat_store'])->name('partials.chat.store');

Route::get('/partials/bets-carousel', [App\Http\Controllers\PartialsController::class, 'bets__carousel'])->name('partials.bets-carousel');
Route::get('/partials/loading-screen', [App\Http\Controllers\PartialsController::class, 'loading__screen'])->name('partials.loading-screen');
Route::get('/partials/sorry-screen', [App\Http\Controllers\PartialsController::class, 'sorry__screen'])->name('partials.sorry-screen');
Route::get('/partials/bet-card', [App\Http\Controllers\PartialsController::class, 'bet__card'])->name('partials.bet-card');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register.create');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [\App\Http\Controllers\Auth\SessionController::class, 'create'])->name('session.create');
Route::post('/login', [\App\Http\Controllers\Auth\SessionController::class, 'store'])->name('session.store');
Route::get('/logout', [\App\Http\Controllers\Auth\SessionController::class, 'destroy'])->name('session.destroy');

Route::get('/load-data', [\App\Http\Controllers\MatchesController::class, 'loadDataFromApi'])->name('matches.load');
Route::get('/withdraw-approval', [\App\Http\Controllers\WithdrawController::class, 'approve'])->name('withdraw.approve');
Route::get('/withdraw', [\App\Http\Controllers\WithdrawController::class, 'index'])->name('withdraw.index');
Route::post('/withdraw', [\App\Http\Controllers\WithdrawController::class, 'request'])->name('withdraw.request');

Route::get('/deposit', [\App\Http\Controllers\DepositController::class, 'index'])->name('deposit.index');
Route::post('/deposit', [\App\Http\Controllers\DepositController::class, 'deposit'])->name('deposit.deposit');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::fallback(function () {
    return view('404');
});
