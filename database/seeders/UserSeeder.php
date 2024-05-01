<?php

namespace Database\Seeders;

use App\Models\User;
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
        $pass1 = Hash::make("admin1");
        User::create([
            'nombre'=>'Javier',
            'apellidos'=>'Sánchez Martínez',
            'email'=> 'admin1@email.com',
            'password'=>$pass1,
        ]);

        $pass2 = Hash::make("usuario1");
        User::create([
            'nombre'=>'Daniel',
            'apellidos'=>'Martínez Krol',
            'email'=> 'dani@email.com',
            'password'=>$pass2,
        ]);

        $pass3 = Hash::make("usuario2");
        User::create([
            'nombre'=>'Laura',
            'apellidos'=>'Pérez García',
            'email'=> 'laura@email.com',
            'password'=>$pass3,
        ]);

        $pass4 = Hash::make("usuario4");
        User::create([
            'nombre'=>'Felipe',
            'apellidos'=>'López Peinado',
            'email'=> 'felipe@email.com',
            'password'=>$pass4,
        ]);

    }
}
