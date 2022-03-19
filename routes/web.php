<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('Dashboard');
    Route::get('/daftar-layanan', [App\Http\Controllers\UserController::class, 'tblLayanan'])->name('Daftar Layanan');
    Route::get('/pembayaran', [App\Http\Controllers\UserController::class, 'pembayaran'])->name('Pembayaran');
});
