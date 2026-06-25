<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'user' => Auth::user()
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email atau password salah'
        ], 401);
    }

    public function register(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Register berhasil'
        ]);
    }
}