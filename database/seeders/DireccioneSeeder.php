<?php

namespace Database\Seeders;

use App\Models\Direccione;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Direccione::create([
            'calle' => 'Avenida de la Constitución',
            'numero' => 45,
            'piso' => 3,
            'puerta' => 'B',
            'codPostal' => '41001',
            'ciudad' => 'Sevilla',
            'provincia' => 'Sevilla',
            'pais' => 'España',
            'user_id' => 2
        ]);

        Direccione::create([
            'calle' => 'Carrer de Sant Joan',
            'numero' => 12,
            'piso' => null,
            'puerta' => null,
            'codPostal' => '08003',
            'ciudad' => 'Barcelona',
            'provincia' => 'Barcelona',
            'pais' => 'España',
            'user_id' => 3
        ]);

        Direccione::create([
            'calle' => 'San Jacinto',
            'numero' => 10,
            'piso' => null,
            'puerta' => null,
            'codPostal' => '41010',
            'ciudad' => 'Sevilla',
            'provincia' => 'Sevilla',
            'pais' => 'España',
            'user_id' => 4
        ]);
    }
}
