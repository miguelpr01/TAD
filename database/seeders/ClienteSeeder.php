<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fechaNacimiento1 = Carbon::create(2001, 8, 5, 16, 55, 0);
        Cliente::create([
            'username'=>'daniimk',
            'telefono'=> '684523456',
            'fechaNacimiento'=> $fechaNacimiento1,
            'user_id'=>'2'
        ]);

        $fechaNacimiento2 = Carbon::create(1996, 12, 14, 17, 23, 0);
        Cliente::create([
            'username'=>'laurapg',
            'telefono'=> '756437824',
            'fechaNacimiento'=> $fechaNacimiento2,
            'user_id'=>'3'
        ]);

        $fechaNacimiento3 = Carbon::create(2000, 3, 1, 20, 0, 0);
        Cliente::create([
            'username'=>'felipelp',
            'telefono'=> '612346732',
            'fechaNacimiento'=> $fechaNacimiento3,
            'user_id'=>'4'
        ]);
    }
}
