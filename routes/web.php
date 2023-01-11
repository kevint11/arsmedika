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
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('Dashboard')->middleware('role:admin|user');
    Route::get('/daftar-layanan', [App\Http\Controllers\LayananController::class, 'tblLayanan'])->name('Daftar Layanan')->middleware('role:admin');
    Route::get('/detail-layanan', [App\Http\Controllers\LayananController::class, 'saldo'])->name('Detail Layanan')->middleware('role:user');


    Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'pembayaran'])->name('Pembayaran')->middleware('role:admin');
    Route::post('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'confirmPembayaran'])->name('Konfirmasi Pembayaran')->middleware('role:admin');

});
