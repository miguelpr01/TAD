<?php

namespace Database\Seeders;

use App\Models\Direccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Direccion::create([
            'calle' => 'Calle de la Rosa',
            'numero' => 7,
            'piso' => 2,
            'puerta' => 'A',
            'codPostal' => '28001',
            'ciudad' => 'Madrid',
            'provincia' => 'Madrid',
            'pais' => 'España',
            'cliente_id' => 1
        ]);

        Direccion::create([
            'calle' => 'Avenida de la Constitución',
            'numero' => 45,
            'piso' => 3,
            'puerta' => 'B',
            'codPostal' => '41001',
            'ciudad' => 'Sevilla',
            'provincia' => 'Sevilla',
            'pais' => 'España',
            'cliente_id' => 2
        ]);

        Direccion::create([
            'calle' => 'Carrer de Sant Joan',
            'numero' => 12,
            'piso' => null,
            'puerta' => null,
            'codPostal' => '08003',
            'ciudad' => 'Barcelona',
            'provincia' => 'Barcelona',
            'pais' => 'España',
            'cliente_id' => 3
        ]);
    }
}
