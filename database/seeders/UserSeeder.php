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
    }
}
