<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imagenBinaria1 = Storage::url("images/proteinas/impact_whey_protein.png");
        Producto::create([
            'nombre'=> 'Impact Whey Protein',
            'precio'=> 26.99,
            'imagen' => $imagenBinaria1,
        ]);

        $imagenBinaria2 = Storage::url("images/proteinas/impact_whey_isolate.png");
        Producto::create([
            'nombre'=> 'Impact Whey Isolate',
            'precio'=> 36.99,
            'imagen' => $imagenBinaria2,
        ]);

        $imagenBinaria3 = Storage::url("images/creatina/gominolas_de_creatina.png");
        Producto::create([
            'nombre'=> 'Gominolas de Creatina',
            'precio'=> 28.99,
            'imagen' => $imagenBinaria3,
        ]);

        $imagenBinaria4 = Storage::url("images/creatina/creatina_monohidrato.png");
        Producto::create([
            'nombre'=> 'Creatina Monohidrato en polvo',
            'precio'=> 19.99,
            'imagen' => $imagenBinaria4,
        ]);

        $imagenBinaria5 = Storage::url("images/ropa/camiseta_sin_mangas.png");
        Producto::create([
            'nombre'=> 'Camiseta sin mangas de entrenamiento para hombre',
            'precio'=> 19.99,
            'imagen' => $imagenBinaria5,
        ]);

        $imagenBinaria6 = Storage::url("images/ropa/sujetador_cuello_halter.png");
        Producto::create([
            'nombre'=> 'Sujetador de cuello halter sin costuras Tempo para mujer',
            'precio'=> 35.99,
            'imagen' => $imagenBinaria6,
        ]);
    }
}
