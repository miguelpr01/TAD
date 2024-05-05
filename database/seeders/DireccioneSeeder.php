<?php

namespace Database\Seeders;

use App\Models\Direccione;
use Illuminate\Database\Seeder;

class DireccioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Direccione::create([
            'calle' => 'Calle de la Rosa',
            'numero' => 7,
            'piso' => 2,
            'puerta' => 'A',
            'codPostal' => '28001',
            'ciudad' => 'Madrid',
            'provincia' => 'Madrid',
            'pais' => 'España',
            'user_id' => 1,
        ]);
    }
}
