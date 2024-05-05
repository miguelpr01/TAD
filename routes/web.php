<?php

use App\Http\Controllers\CreatinaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProteinaController;
use App\Http\Controllers\RopaController;
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

Route::get('ver_proteinas', [ProteinaController::class, 'all'])->name('ver_proteinas');
Route::get('ver_creatinas', [CreatinaController::class, 'all'])->name('ver_creatinas');
Route::get('ver_ropas', [RopaController::class, 'all'])->name('ver_ropas');

Route::get('create/{string}', [ProductoController::class, 'create'])->name('nuevo_producto');

Route::post('crear_proteina', [ProteinaController::class, 'create'])->name('confirmar_crear_proteina');
Route::post('crear_creatina', [CreatinaController::class, 'create'])->name('confirmar_crear_creatina');
Route::post('crear_ropa', [RopaController::class, 'create'])->name('confirmar_crear_ropa');

Route::delete('delete/{id}', [ProductoController::class, 'delete'])->name('borrar_producto');

Route::get('editar_proteina/{id}', [ProteinaController::class, 'edit'])->name('editar_proteina');
Route::put('confirmar_editar_proteina/{id}', [ProteinaController::class, 'update'])->name('confirmar_editar_proteina');
Route::get('editar_creatina/{id}', [CreatinaController::class, 'edit'])->name('editar_creatina');
Route::put('confirmar_editar_creatina/{id}', [CreatinaController::class, 'update'])->name('confirmar_editar_creatina');
Route::get('editar_ropa/{id}', [RopaController::class, 'edit'])->name('editar_ropa');
Route::put('confirmar_editar_ropa/{id}', [RopaController::class, 'update'])->name('confirmar_editar_ropa');

Route::get('producto/{id}', [ProductoController::class,'seleccionarProducto'])->name('producto.seleccionarProducto');
Route::get('producto_comprobar_autenticacion', [ProductoController::class,'comprobar_autenticacion'])->name('producto_comprobar_autenticacion');

Route::get('pedido/ya', [PedidoController::class, 'comprar_ya'])->name('pedido.comprar_ya');