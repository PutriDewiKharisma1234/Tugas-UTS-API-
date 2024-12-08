<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
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

Route::get('/login', function () {
    return response()->json(['message' => 'Unauthenticated.'], 401);
})->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/absensi/masuk', [AbsensiController::class, 'absenMasuk']);
    Route::post('/absensi/keluar', [AbsensiController::class, 'absenKeluar']);
    Route::get('/absensi/riwayat', [AbsensiController::class, 'riwayat']);
});
