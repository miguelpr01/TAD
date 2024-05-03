<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $pass1 = Hash::make("admin1");
        $fechaNacimiento1 = Carbon::now()->subYears(rand(18,65))->subDays(rand(0, 365));
        $fechaNacFormateada1 = $fechaNacimiento1->format("Y-m-d H:i:s");
        User::create([
            'nombre'=>'Javier',
            'apellidos'=>'Sánchez Martínez',
            'email'=> 'admin1@email.com',
            'password'=>bcrypt('admin'),
            'telefono'=>'688945783',
            'fechaNacimiento'=>$fechaNacFormateada1,
            'rol_id'=>1,
        ]);

        // $pass2 = Hash::make("usuario1");
        $fechaNacimiento2 = Carbon::now()->subYears(rand(18,65))->subDays(rand(0, 365));
        $fechaNacFormateada2 = $fechaNacimiento2->format("Y-m-d H:i:s");
        User::create([
            'nombre'=>'Daniel',
            'apellidos'=>'Martínez Krol',
            'email'=> 'dani@email.com',
            'password'=>bcrypt('1234567890'),
            'telefono'=>'688945783',
            'fechaNacimiento'=>$fechaNacFormateada2,
            'rol_id'=>2,
        ]);

        // $pass3 = Hash::make("usuario2");
        $fechaNacimiento3 = Carbon::now()->subYears(rand(18,65))->subDays(rand(0, 365));
        $fechaNacFormateada3 = $fechaNacimiento3->format("Y-m-d H:i:s");
        User::create([
            'nombre'=>'Laura',
            'apellidos'=>'Pérez García',
            'email'=> 'laura@email.com',
            'password'=>bcrypt('1234567890'),
            'telefono'=>'688945783',
            'fechaNacimiento'=>$fechaNacFormateada3,
            'rol_id'=>2,
        ]);

        // $pass4 = Hash::make("usuario4");
        $fechaNacimiento4 = Carbon::now()->subYears(rand(18,65))->subDays(rand(0, 365));
        $fechaNacFormateada4 = $fechaNacimiento4->format("Y-m-d H:i:s");
        User::create([
            'nombre'=>'Felipe',
            'apellidos'=>'López Peinado',
            'email'=> 'felipe@email.com',
            'password'=>bcrypt('1234567890'),
            'telefono'=>'688945783',
            'fechaNacimiento'=>$fechaNacFormateada4,
            'rol_id'=>2,
        ]);

    }
}
