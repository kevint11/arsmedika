<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
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

Route::get('/auth/google', [\App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('Google Login');
Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('Google Callback');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Route for displaying the forgot password form
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// // Route for submitting the email address for password reset
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// // Route for displaying the password reset form
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// // Route for submitting the new password
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('Dashboard')->middleware('role:admin|user');
    Route::get('/ganti-password', [App\Http\Controllers\UserController::class, 'formPassword'])->name('Form Password')->middleware('role:admin|user');
    Route::post('/ganti-password', [App\Http\Controllers\UserController::class, 'gantiPassword'])->name('Ganti Password')->middleware('role:admin|user');
    
    Route::get('/daftar-layanan', [App\Http\Controllers\LayananController::class, 'tblLayanan'])->name('Daftar Layanan')->middleware('role:admin');
    Route::get('/detail-layanan', [App\Http\Controllers\LayananController::class, 'saldo'])->name('Detail Layanan')->middleware('role:user');
    
    Route::post('/dataLayanan', [App\Http\Controllers\PembayaranController::class, 'dataKartu'])->name('Data Kartu')->middleware('role:user');
    Route::post('/biodata', [App\Http\Controllers\PembayaranController::class, 'dataDiri'])->name('Data Diri')->middleware('role:user');
    Route::post('/dashboard', [App\Http\Controllers\PembayaranController::class, 'kelasLayanan'])->name('Pilih Kelas')->middleware('role:user');

    Route::get('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'pembayaran'])->name('Pembayaran')->middleware('role:admin');
    Route::post('/pembayaran', [App\Http\Controllers\PembayaranController::class, 'confirmPembayaran'])->name('Konfirmasi Pembayaran')->middleware('role:admin');

});
