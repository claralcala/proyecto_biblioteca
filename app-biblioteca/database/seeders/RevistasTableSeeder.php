<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RevistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('revistas')->insert([
            [
                'titulo' => 'National Geographic',
                'numero' => '1',
                'anio_publicacion' => '2023',
                'portada' => 'national_geographic.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => 'Science',
                'numero' => '2',
                'anio_publicacion' => '2024',
                'portada' => 'science.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
