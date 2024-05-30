<?php

use App\Http\Controllers\CriptomonedaAdminController;
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

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();

Route::resource('criptomonedasAdmin', \App\Http\Controllers\CriptomonedaAdminController::class);
Route::resource('ventasAdmin', \App\Http\Controllers\VentaAdminController::class);
Route::resource('comprasAdmin', \App\Http\Controllers\CompraAdminController::class);

Route::resource('ventas', \App\Http\Controllers\VentasController::class);
Route::resource('compras', \App\Http\Controllers\ComprasController::class);

Route::resource('users', \App\Http\Controllers\UserController::class);
//Es necesario colocar una ruta nueva porque laravel solo genera las rutas para los metodos ya definidos por defecto
                //URL                                           //Controlador      //Metodo           //Nombre de la ruta
Route::put('usuario/{id}', [\App\Http\Controllers\UserController::class, 'actualizar'])->name('usuario.actualizar');

Route::resource('home', \App\Http\Controllers\HomeController::class);

// En routes/web.php
Route::get('/compras/comprahome/{id}', [\App\Http\Controllers\ComprasController::class, 'comprahome'])->name('compras.comprahome');

//PURAS MAMADAS
//Route::post('criptomonedasAdmin/create', '\App\Http\Controllers\CriptomonedaAdminController@store');
Route::put('criptomonedasAdmin/{id}/edit', '\App\Http\Controllers\CriptomonedaAdminController@update');

