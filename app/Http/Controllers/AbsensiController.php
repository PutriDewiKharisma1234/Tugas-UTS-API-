<?php

// app/Http/Controllers/AbsensiController.php
namespace App\Http\Controllers;

use App\Models\absensi;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller {
    public function absenMasuk(Request $request)
    {
        $request->validate(['karyawan_id' => 'required|exists:karyawans,id']);

        $absensi = Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'waktu_masuk' => now(),
        ]);

        return response()->json(['message' => 'Absen masuk berhasil', 'data' => $absensi]);
    }

    public function absenKeluar(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update(['waktu_keluar' => now()]);

        return response()->json(['message' => 'Absen keluar berhasil', 'data' => $absensi]);
    }


    public function riwayat($karyawan_id)
    {
        $riwayat = Absensi::where('karyawan_id', $karyawan_id)->get();
        return response()->json($riwayat);
    }

}
