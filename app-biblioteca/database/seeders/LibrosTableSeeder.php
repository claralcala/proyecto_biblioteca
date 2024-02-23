<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('libros')->insert([
            [
                'titulo' => 'El Principito',
                'autor' => 'Antoine de Saint-Exupery',
                'isbn' => '567567567567457',
                'anio_publicacion' => '1943',
                'portada' => 'el_principito.jpg', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'isbn' => '354345344',
                'anio_publicacion' => '1949',
                'portada' => '1984.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
