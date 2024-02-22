<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ordenadors')->insert([
            [
                'marca' => 'Dell',
                'modelo' => 'XPS 13',
                'numero_referencia' => 'ABC123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'marca' => 'Apple',
                'modelo' => 'MacBook Pro',
                'numero_referencia' => 'XYZ789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
