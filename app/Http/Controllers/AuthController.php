<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Register User
     */
    public function register(Request $request)
    {
        $user = [
            'id' => rand(1, 1000),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role' => 'user',
            'created_at' => now()
        ];

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'data' => $user
        ], 201);
    }

    /**
     * Login User
     */
    public function login(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'data' => [
                'user_id' => 1,
                'name' => 'Khairul Amna',
                'email' => $request->input('email'),
                'token' => 'sample_jwt_token_123456',
                'status' => 'authenticated',
                'login_time' => now()
            ]
        ]);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully',
            'data' => [
                'status' => 'logged_out',
                'logout_time' => now()
            ]
        ]);
    }

    /**
     * Get User Profile
     */
    public function getProfile($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Profile retrieved successfully',
            'data' => [
                'id' => $id,
                'name' => 'Khairul Amna',
                'email' => 'khairul@example.com',
                'phone' => '081234567890',
                'address' => 'Banda Aceh',
                'role' => 'user',
                'created_at' => '2025-01-15'
            ]
        ]);
    }

    /**
     * Update User Profile
     */
    public function updateProfile(Request $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'data' => [
                'id' => $id,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Change Password
     */
    public function changePassword(Request $request, $id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully',
            'data' => [
                'user_id' => $id,
                'updated_at' => now()
            ]
        ]);
    }

    /**
     * Delete Account
     */
    public function deleteAccount($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Account deleted successfully',
            'data' => [
                'user_id' => $id,
                'deleted_at' => now()
            ]
        ]);
    }
}