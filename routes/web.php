<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('submitLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('player')->group(function () {
    Route::prefix('players')->group(function () {
        Route::get('/create', [PlayerController::class, 'create'])->name('back.players.create');
        Route::post('/insert', [PlayerController::class, 'insert'])->name('back.players.insert');
    });
});
