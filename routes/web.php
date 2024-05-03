<?php

use App\Http\Controllers\CreatinaController;
use App\Http\Controllers\IndexController;
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

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware('auth');

Route::get('/create/product', [ProductoController::class, 'create']);
Route::post('/proteina', [ProteinaController::class, 'create'])->name('proteina.create');
Route::post('/creatina', [CreatinaController::class, 'create'])->name('creatina.create');
Route::post('/ropa', [RopaController::class, 'create'])->name('ropa.create');

Route::put('/proteina', [ProteinaController::class, 'update'])->name('proteina.update');
Route::put('/creatina', [CreatinaController::class, 'update'])->name('creatina.update');
Route::put('/ropa', [RopaController::class, 'update'])->name('ropa.update');

Route::delete('/proteina/{id?}', [ProteinaController::class, 'delete'])->name('proteina.delete');
Route::delete('/creatina/{id?}', [CreatinaController::class, 'delete'])->name('creatina.delete');
Route::delete('/ropa/{id?}', [RopaController::class, 'delete'])->name('ropa.delete');

Route::get('/proteina/{id?}', [ProteinaController::class, 'read'])->name('proteina.read');
Route::get('/creatina/{id?}', [CreatinaController::class, 'read'])->name('creatina.read');
Route::get('/ropa/{id?}', [RopaController::class, 'read'])->name('ropa.read');

Route::get('/proteina', [ProteinaController::class, 'all'])->name('proteina.all');
Route::get('/creatina', [CreatinaController::class, 'all'])->name('creatina.all');
Route::get('/ropa', [RopaController::class, 'all'])->name('ropa.all');
Route::get('redirect_login', [LoginController::class, 'redirect_login'])->name('redirectlogin');
Route::get('redirect_register', [LoginController::class, 'redirect_register'])->name('redirectregister');
Route::get('all', [ClienteController::class, 'all'])->name('verclientes');
