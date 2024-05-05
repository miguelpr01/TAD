<?php

namespace Database\Seeders;

use App\Models\Creatina;
use Illuminate\Database\Seeder;

class CreatinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Creatina::create([
            'opcion'=>'90 gominolas',
            'producto_id'=>3,
        ]);

        Creatina::create([
            'opcion'=>'250 g',
            'producto_id'=>4,
        ]);
    }
}
