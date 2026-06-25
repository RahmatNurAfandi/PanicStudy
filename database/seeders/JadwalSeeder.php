<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwals')->insert([
            [
                'mata_pelajaran' => 'Algoritma',
                'tanggal' => '2026-06-30',
                'jam' => '08:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}