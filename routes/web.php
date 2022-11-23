<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProveedoresController;
//tarea gonza
use App\Http\Controllers\ContactenosController;
use App\Http\Controllers\EjemploController;
use App\Http\Controllers\TareaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/** tarea Gonza */

/** Contactenos */
Route::get('/contactenos', [ContactenosController::class, 'index'])->name('contactenos');

/** Ejemplo */
Route::get('/ejemplo',[EjemploController::class, 'index'])->name('ejemplo');

/**Tarea */
Route::get('/tarea',[TareaController::class, 'index'])->name('tarea');

/** Proveedores */ 
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');

/**
 * Tarea crear controlador vista y ruta
 * 
 * Contactenos
 * Ejemplo
 * Tarea
 * 
 */


/** Inventario */
Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario');
Route::get('/delete_inventario', [InventarioController::class, 'delete'])->name('delete_inventario');
Route::get('/edit_inventario', [InventarioController::class, 'edit'])->name('edit_inventario');
Route::post('/post_inventario', [InventarioController::class, 'post_edit'])->name('post_inventario');
Route::get('/create_inventario', [InventarioController::class, 'create'])->name('create_inventario');
Route::post('/post_create_inventario', [InventarioController::class, 'post_create'])->name('post_create_inventario');

/** Clientes */

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
Route::get('/delete_clientes', [ClientesController::class, 'delete'])->name('delete_clientes');
Route::get('/edit_clientes', [ClientesController::class, 'edit'])->name('edit_clientes');
Route::post('/post_clientes', [ClientesController::class, 'post_edit'])->name('post_clientes');
Route::get('/create_clientes', [ClientesController::class, 'create'])->name('create_clientes');
Route::post('/post_create_clientes', [ClientesController::class, 'post_create'])->name('post_create_clientes');

/** Ventas */


Route::get('/ventas', [VentaController::class, 'index'])->name('ventas');
Route::get('/delete_ventas', [VentaController::class, 'delete'])->name('delete_ventas');
Route::get('/edit_ventas', [VentaController::class, 'edit'])->name('edit_ventas');
Route::post('/post_ventas', [VentaController::class, 'post_edit'])->name('post_ventas');
Route::get('/create_ventas', [VentaController::class, 'create'])->name('create_ventas');
Route::post('/post_create_ventas', [VentaController::class, 'post_create'])->name('post_create_ventas');


/** Proveedores */


Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');
Route::get('/delete_proveedores', [ProveedoresController::class, 'delete'])->name('delete_proveedores');
Route::get('/edit_proveedores', [ProveedoresController::class, 'edit'])->name('edit_proveedores');
Route::post('/post_proveedores', [ProveedoresController::class, 'post_edit'])->name('post_proveedores');
Route::get('/create_proveedores', [ProveedoresController::class, 'create'])->name('create_proveedores');
Route::post('/post_create_proveedores', [ProveedoresController::class, 'post_create'])->name('post_create_proveedores');