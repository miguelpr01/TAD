<?php

use App\Http\Controllers\CreatinaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProteinaController;
use App\Http\Controllers\RopaController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\UserController;
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
Route::post('producto_comprobarautenticacion', [ProductoController::class,'comprobarautenticacion'])->name('producto.comprobarautenticacion');
Route::get('lista_proteinas', [ProductoController::class,'listaproteinas'])->name('producto.listaproteinas');
Route::get('lista_creatinas', [ProductoController::class,'listacreatinas'])->name('producto.listacreatinas');
Route::get('lista_ropas', [ProductoController::class,'listaropas'])->name('producto.listaropas');

Route::get('pedido/ya', [PedidoController::class, 'comprar_ya'])->name('pedido.comprar_ya');
Route::get('pedido/carrito', [PedidoController::class, 'comprar_carrito'])->name('pedido.comprar_carrito');

Route::get('ver_pedidos', [PedidoController::class, 'all'])->name('ver_pedidos');
Route::get('ver_todos_pedidos', [PedidoController::class, 'ver_todos_pedidos'])->name('ver_todos_pedidos');
Route::put('editar_estado/{id}', [PedidoController::class, 'modificar_estado'])->name('editar_estado');

Route::get('lista_proteinas', [ProductoController::class,'listaproteinas'])->name('producto.listaproteinas');
Route::get('lista_creatinas', [ProductoController::class,'listacreatinas'])->name('producto.listacreatinas');
Route::get('lista_ropas', [ProductoController::class,'listaropas'])->name('producto.listaropas');

Route::get('favoritos', [WishlistController::class, 'wishlist'])->name('wishlist.wishlist');
Route::post('agregar_favorito/{producto}', [WishlistController::class, 'agregar_favorito'])->name('wishlist.agregar_favorito');
Route::delete('delete_wishlist/{id}', [WishlistController::class, 'eliminar_producto_wishlist'])->name('wishlist.eliminar_producto_whishlist');
Route::get('productos_en_favoritos', [WishlistController::class, 'productos_favoritos'])->name('wishlist.productos_favoritos');

Route::get('carrito_compra', [CarritoController::class, 'carrito_compra'])->name('carrito_compra.carrito_compra');
Route::post('agregar_producto/{producto}', [CarritoController::class, 'agregar_producto'])->name('carrito_compra.agregar_producto');
Route::delete('eliminar_producto/{id}', [CarritoController::class, 'eliminar_producto'])->name('carrito_compra.eliminar_producto');
Route::get('productos_carrito', [CarritoController::class, 'productos_carrito'])->name('carrito_compra.productos_carrito');
Route::get('total', [CarritoController::class, 'total'])->name('carrito_compra.total');
Route::put('actualizar_cantidad/{id}', [CarritoController::class, 'actualizar_cantidad'])->name('carrito_compra.actualizar_cantidad');

Route::get('yo', [UserController::class,'detalles'])->middleware('auth', 'verified')->name('user.detalles');
Route::post('editar_usuario', [UserController::class,'editar'])->middleware('auth', 'verified')->name('user.editar');