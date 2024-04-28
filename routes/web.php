<?php

use App\Models\MenuPrecio;
use App\Http\Controllers\MenuPrecioController;
use App\Http\Controllers\AdministracionController;
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

/*Route::get('/', function () {
    return view('index');
}); esto se deshabilita ya que las ruta que sigue que tiene el '/' sobrescribe esta ruta */

Route::get('/', [MenuPrecioController::class, 'index'])->name('index');
Route::get('/index.edit/{producto}', [MenuPrecioController::class, 'edit'])->name('editar');
Route::put('/administracion.actualizar/{producto}', [MenuPrecioController::class, 'update'])->name('actualizar');
Route::get('/llamar vista crear producto', [MenuPrecioController::class, 'vistaCrear'])->name('vistaCrear');
Route::put('/crear producto', [MenuPrecioController::class, 'store'])->name('crearProducto');
Route::delete('/eliminar/{producto}',[MenuPrecioController::class, 'destroy'])->name('eliminarRegistro');

Route::get('/index producto eliminado', [MenuPrecioController::class, 'indexMensajeEliminar'])->name('index2');