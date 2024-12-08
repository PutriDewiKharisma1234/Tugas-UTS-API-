<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;

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

// Routes for AbsensiController
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/absen-masuk', [AbsensiController::class, 'absenMasuk']);
});

Route::post('/login', [UserController::class, 'login']);

// Routes for KaryawanController
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
Route::post('/absen-masuk', [AbsensiController::class, 'absenMasuk']);
Route::post('/absen-keluar/{id}', [AbsensiController::class, 'absenKeluar']);
Route::get('/riwayat/{karyawan_id}', [AbsensiController::class, 'riwayat']);


