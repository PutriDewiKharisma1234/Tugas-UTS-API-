<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; 
use Illuminate\Http\Request;

class KaryawanController extends Controller 
{
    // Menampilkan semua data karyawan
    public function index()
    {
        // Mendapatkan semua karyawan
        $karyawan = Karyawan::all(); 

        // Mengembalikan data dalam format JSON
        return response()->json($karyawan); 
    }

    // Menampilkan detail karyawan berdasarkan ID
    public function show($id)
    {
        // Mencari karyawan berdasarkan ID
        $karyawan = Karyawan::find($id); 

        // Jika karyawan tidak ditemukan
        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan'
            ], 404);
        }

        // Mengembalikan data karyawan dalam format JSON
        return response()->json($karyawan); 
    }

    // Menambahkan karyawan baru
    public function store(Request $request)
    {
        // Validasi input yang diterima
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:karyawans', 
            'position' => 'required|string|max:50',
            'department' => 'required|string|max:50',
            'join_date' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        // Membuat karyawan baru
        $karyawan = Karyawan::create($request->all()); 

        // Mengembalikan respons sukses dengan data karyawan baru
        return response()->json([
            'message' => 'Karyawan berhasil ditambahkan',
            'karyawan' => $karyawan 
        ], 201);
    }

    // Memperbarui data karyawan berdasarkan ID
    public function update(Request $request, $id)
    {
        // Mencari karyawan berdasarkan ID
        $karyawan = Karyawan::find($id); 

        // Jika karyawan tidak ditemukan
        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan'
            ], 404);
        }

        // Validasi input yang diterima
        $request->validate([
            'name' => 'string|max:50',
            'email' => 'email|unique:karyawans,email,' . $id, 
            'position' => 'string|max:50',
            'department' => 'string|max:50',
            'join_date' => 'date',
            'status' => 'in:aktif,nonaktif',
        ]);

        // Memperbarui data karyawan
        $karyawan->update($request->all()); 

        // Mengembalikan respons sukses dengan data karyawan yang telah diperbarui
        return response()->json([
            'message' => 'Data karyawan berhasil diperbarui',
            'karyawan' => $karyawan 
        ]);
    }

    // Menghapus karyawan berdasarkan ID
    public function destroy($id)
    {
        // Mencari karyawan berdasarkan ID
        $karyawan = Karyawan::find($id); 

        // Jika karyawan tidak ditemukan
        if (!$karyawan) {
            return response()->json([
                'message' => 'Karyawan tidak ditemukan'
            ], 404);
        }

        // Menghapus karyawan
        $karyawan->delete(); 

        // Mengembalikan respons sukses
        return response()->json([
            'message' => 'Karyawan berhasil dihapus'
        ]);
    }
}
