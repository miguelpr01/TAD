<?php

namespace Database\Seeders;

use App\Models\Ropa;
use Illuminate\Database\Seeder;

class RopaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ropa::create([
            'talla'=>'L',
            'color'=>'negro',
            'producto_id'=>5,
        ]);

        Ropa::create([
            'talla'=>'S',
            'color'=>'negro',
            'producto_id'=>6,
        ]);
    }
}
