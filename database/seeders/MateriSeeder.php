<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('materis')->insert([
            [
                'judul' => 'Algoritma Dasar',
                'deskripsi' => 'Pengenalan algoritma dan flowchart',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Struktur Data',
                'deskripsi' => 'Belajar array dan linked list',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}