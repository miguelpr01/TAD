<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'rol'=>'admin',
        ]);

        Role::create([
            'rol'=>'usuario',
        ]);
    }
}
