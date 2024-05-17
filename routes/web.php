<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InvestigatorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ValidityController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// RUTA PAGINA DE INICIO
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// RUTA LOGIN (INICIAL)
Route::get('/', [AuthenticatedSessionController::class, 'create']);

// RUTA DE LAS VIGENCIAS
Route::get('/validity', [ValidityController::class, "index"])->name('validity.index');

// RUTA PARA MOSTRAR LOS PROYECTOS DE UNA VIGENCIA
Route::get('/{validityYear}/index', [ValidityController::class, "projects"])->name('validity.projects');


// RUTAS PROTEGIDAS PARA EL ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {

    // RUTA PARA CREAR UNA VIGENCIA
    Route::post('/validity/store', [ValidityController::class, 'store'])
        ->name('validity.store');

    // RUTA PARA EDITAR UNA VIGENCIA
    Route::put('/{validityID}/update', [ValidityController::class, 'update'])
        ->name('validity.update');

    // RUTA PARA MOSTRAR LOS INVESTIGADORES
    Route::post('/investigator/index', [InvestigatorController::class, 'index'])
        ->name('investigator.index');

    // RUTA PARA CREAR UN INVESTIGADOR
    Route::post('/investigator/store', [InvestigatorController::class,'store'])
        ->name('investigator.store');

    // RUTA PARA EDITAR UN INVESTIGADOR
    Route::put('/investigator/{userID}/update', [InvestigatorController::class, 'update'])
        ->name('investigator.update');

    // RUTA PARA ELIMINAR UN INVESTIGADOR
    Route::delete('/investigator/{userID}/destroy', [InvestigatorController::class, 'destroy'])
        ->name('investigator.destroy');

});

require __DIR__ . '/auth.php';
