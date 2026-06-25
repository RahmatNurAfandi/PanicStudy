<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatihanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('latihans')->insert([
            [
                'soal' => 'Apa kepanjangan CPU?',
                'jawaban' => 'Central Processing Unit',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}