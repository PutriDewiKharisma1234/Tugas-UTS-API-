<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            return response()->json([
                'message' => 'Login berhasil',
            ]);
        }

        // Jika gagal autentikasi
        return response()->json([
            'message' => 'Gagal login',
        ], 401);
    }

    public function logout()
    {
        Auth::logout(); // Keluar dari sesi

        return response()->json([
            'message' => 'Logout berhasil',
        ]);
    }
}
