<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\AntecedenteController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function () {
    Route::get('/',[AuthController::class, 'index'])->name('login');
    Route::post('/logear',[AuthController::class,'logear'])->name('logear');
});

Route::middleware("auth")->group(function () {
    Route::get('/home',[AuthController::class,'home'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
    
    Route::get('/expedientes', function () {
        return view('modules.expedientes.index');
    })->name('expedientes');
    Route::get('/expedientes/crear', [ExpedienteController::class, 'create'])->name('expedientes.crear');
    Route::post('/expedientes', [ExpedienteController::class, 'store'])->name('expedientes.store');
    Route::get('/expedientes/buscar', [ExpedienteController::class, 'buscar'])->name('expedientes.buscar');
    Route::get('/expedientes/{mascota}/consultas', [ExpedienteController::class, 'consultas'])->name('expedientes.consultas');
    Route::get('/expedientes/{mascota}/consultas/crear', [ExpedienteController::class, 'createConsulta'])->name('expedientes.consultas.crear');
    Route::post('/expedientes/{mascota}/consultas', [ExpedienteController::class, 'storeConsulta'])->name('expedientes.consultas.store');
    Route::get('/expedientes/{mascota}/consultas/{consulta}', [ExpedienteController::class, 'showConsulta'])->name('expedientes.consultas.show');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/diagnostico', [ExpedienteController::class, 'diagnostico'])->name('expedientes.consultas.diagnostico');
    Route::put('/expedientes/{mascota}/consultas/{consulta}/diagnostico', [ExpedienteController::class, 'updateDiagnostico'])->name('expedientes.consultas.diagnostico.update');
    
    Route::get('/expedientes/{mascota}/consultas/{consulta}/tratamiento', [ExpedienteController::class, 'tratamiento'])->name('expedientes.consultas.tratamiento');
    Route::put('/expedientes/{mascota}/consultas/{consulta}/tratamiento', [ExpedienteController::class, 'updateTratamiento'])->name('expedientes.consultas.tratamiento.update');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/receta', [ExpedienteController::class, 'imprimirReceta'])->name('expedientes.consultas.receta');

    // Rutas de Antecedentes (Alergias)
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alergias', [AntecedenteController::class, 'historialAlergias'])->name('expedientes.consultas.alergias');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alergias/crear', [AntecedenteController::class, 'crearAlergia'])->name('expedientes.consultas.alergias.crear');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alergias/{alergia}/eliminar', [AntecedenteController::class, 'deleteAlergia'])->name('expedientes.consultas.alergias.delete');
    Route::post('/expedientes/{mascota}/consultas/{consulta}/alergias', [AntecedenteController::class, 'storeAlergia'])->name('expedientes.consultas.alergias.store');
    Route::delete('/expedientes/{mascota}/consultas/{consulta}/alergias/{alergia}', [AntecedenteController::class, 'destroyAlergia'])->name('expedientes.consultas.alergias.destroy');

    // Rutas de Antecedentes (Lesiones)
    Route::get('/expedientes/{mascota}/consultas/{consulta}/lesiones', [AntecedenteController::class, 'historialLesiones'])->name('expedientes.consultas.lesiones');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/lesiones/crear', [AntecedenteController::class, 'crearLesion'])->name('expedientes.consultas.lesiones.crear');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/lesiones/{lesion}/eliminar', [AntecedenteController::class, 'deleteLesion'])->name('expedientes.consultas.lesiones.delete');
    Route::post('/expedientes/{mascota}/consultas/{consulta}/lesiones', [AntecedenteController::class, 'storeLesion'])->name('expedientes.consultas.lesiones.store');
    Route::delete('/expedientes/{mascota}/consultas/{consulta}/lesiones/{lesion}', [AntecedenteController::class, 'destroyLesion'])->name('expedientes.consultas.lesiones.destroy');

    // Rutas de Antecedentes (Patológicos)
    Route::get('/expedientes/{mascota}/consultas/{consulta}/patologicos', [AntecedenteController::class, 'historialPatologicos'])->name('expedientes.consultas.patologicos');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/patologicos/crear', [AntecedenteController::class, 'crearPatologico'])->name('expedientes.consultas.patologicos.crear');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/patologicos/{patologico}/eliminar', [AntecedenteController::class, 'deletePatologico'])->name('expedientes.consultas.patologicos.delete');
    Route::post('/expedientes/{mascota}/consultas/{consulta}/patologicos', [AntecedenteController::class, 'storePatologico'])->name('expedientes.consultas.patologicos.store');
    Route::delete('/expedientes/{mascota}/consultas/{consulta}/patologicos/{patologico}', [AntecedenteController::class, 'destroyPatologico'])->name('expedientes.consultas.patologicos.destroy');

    // Rutas de Antecedentes (Alimentación)
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alimentacion', [AntecedenteController::class, 'historialAlimentacion'])->name('expedientes.consultas.alimentacion');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alimentacion/crear', [AntecedenteController::class, 'crearAlimentacion'])->name('expedientes.consultas.alimentacion.crear');
    Route::get('/expedientes/{mascota}/consultas/{consulta}/alimentacion/{alimentacion}/eliminar', [AntecedenteController::class, 'deleteAlimentacion'])->name('expedientes.consultas.alimentacion.delete');
    Route::post('/expedientes/{mascota}/consultas/{consulta}/alimentacion', [AntecedenteController::class, 'storeAlimentacion'])->name('expedientes.consultas.alimentacion.store');
    Route::delete('/expedientes/{mascota}/consultas/{consulta}/alimentacion/{alimentacion}', [AntecedenteController::class, 'destroyAlimentacion'])->name('expedientes.consultas.alimentacion.destroy');

    // Rutas exclusivas del administrador
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', [AdminController::class, 'home'])->name('home');
        
        // Gestión de usuarios
        Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/crear', [UserController::class, 'create'])->name('usuarios.create');
        Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
        Route::get('/usuarios/{usuario}/editar', [UserController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');
        Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');
        Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    });
});

