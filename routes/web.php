<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/home', [IndexController::class, 'index'])->middleware('auth')->name('index.indexlogado');

Route::get('producto/{id}', [ProductoController::class,'seleccionarProducto'])->name('producto.seleccionarProducto');
Route::post('producto_comprobarautenticacion', [ProductoController::class,'comprobarautenticacion'])->name('producto.comprobarautenticacion');
Route::get('lista_proteinas', [ProductoController::class,'listaproteinas'])->name('producto.listaproteinas');
Route::get('lista_creatinas', [ProductoController::class,'listacreatinas'])->name('producto.listacreatinas');
Route::get('lista_ropas', [ProductoController::class,'listaropas'])->name('producto.listaropas');


