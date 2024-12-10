<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;

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

// Public Routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rute untuk karyawan, dengan autentikasi berbasis sesi

        Route::get('/karyawan', [KaryawanController::class, 'index']);
        Route::get('/karyawan/{id}', [KaryawanController::class, 'show']);
        Route::post('/karyawan', [KaryawanController::class, 'store']);
        Route::put('/karyawan/{id}', [KaryawanController::class, 'update']);
        Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy']);


    // Routes for AbsensiController
   
        Route::post('absen-masuk', [AbsensiController::class, 'absenMasuk']); // Employee clock-in
        Route::post('absen-keluar/{id}', [AbsensiController::class, 'absenKeluar']); // Employee clock-out by ID
        Route::get('riwayat/{karyawan_id}', [AbsensiController::class, 'riwayat']); // Attendance history for employee

