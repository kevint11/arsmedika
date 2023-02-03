<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::get('/layanan', [App\Http\Controllers\Api\PembayaranController::class, 'tblLayanan'])->middleware('role:admin');
    Route::get('/saldo', [App\Http\Controllers\Api\PembayaranController::class, 'saldo'])->middleware('role:user');

    Route::post('/kelas', [App\Http\Controllers\Api\PembayaranController::class, 'kelasLayanan'])->middleware('role:user');
    Route::post('/kelas-biodata', [App\Http\Controllers\PembayaranController::class, 'dataKartu'])->middleware('role:user');
    Route::post('/biodata', [App\Http\Controllers\PembayaranController::class, 'dataDiri'])->middleware('role:user');

    Route::post('/pembayaran', [App\Http\Controllers\Api\PembayaranController::class, 'confirmPembayaran'])->middleware('role:admin');
});
