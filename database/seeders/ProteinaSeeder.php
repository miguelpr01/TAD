<?php

namespace Database\Seeders;

use App\Models\Proteina;
use Illuminate\Database\Seeder;

class ProteinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proteina::create([
            "sabor"=> "Chocolate y caramelo",
            'cantidad'=>'1 kg',
            'producto_id'=>1
        ]);

        Proteina::create([
            "sabor"=> "Chocolate blanco",
            'cantidad'=>'1 kg',
            'producto_id'=>2
        ]);
    }
}
