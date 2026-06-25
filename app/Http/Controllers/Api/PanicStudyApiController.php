<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class PanicStudyApiController extends Controller
{
    public function dashboard()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data dashboard berhasil diambil',
            'data' => [
                'weekly_hours' => 18.5,
                'completed_tasks' => 15,
                'today_tasks_count' => 3,
                'streak' => 7
            ]
        ]);
    }

    public function materi()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data materi berhasil diambil',
            'data' => [
                [
                    'id' => 1,
                    'title' => 'Kalkulus & Aljabar',
                    'category' => 'Matematika',
                    'progress' => 67
                ],
                [
                    'id' => 2,
                    'title' => 'Struktur Data & Algoritma',
                    'category' => 'Ilmu Komputer',
                    'progress' => 40
                ]
            ]
        ]);
    }

    public function detailMateri($id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Detail materi berhasil diambil',
            'data' => [
                'id' => $id,
                'title' => 'Materi ' . $id,
                'description' => 'Penjelasan lengkap materi ' . $id,
                'progress' => rand(10, 100)
            ]
        ]);
    }

    public function jadwal()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data jadwal berhasil diambil',
            'data' => [
                [
                    'id' => 1,
                    'subject' => 'Kalkulus',
                    'date' => '2026-06-26',
                    'time' => '08:00'
                ],
                [
                    'id' => 2,
                    'subject' => 'Algoritma',
                    'date' => '2026-06-26',
                    'time' => '13:00'
                ]
            ]
        ]);
    }

    public function latihan()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data latihan berhasil diambil',
            'data' => [
                [
                    'id' => 1,
                    'title' => 'Latihan Kalkulus',
                    'question_count' => 20
                ],
                [
                    'id' => 2,
                    'title' => 'Latihan Algoritma',
                    'question_count' => 15
                ]
            ]
        ]);
    }

    public function progress()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data progress berhasil diambil',
            'data' => [
                'completed' => 15,
                'total' => 22,
                'percentage' => 68
            ]
        ]);
    }

    public function profil()
    {
        return response()->json([
            'status' => true,
            'message' => 'Data profil berhasil diambil',
            'data' => [
                'id' => 1,
                'name' => 'Muhammad Azizi',
                'email' => 'azizi@panicstudy.com',
                'target_belajar' => '3 Jam/Hari'
            ]
        ]);
    }
}