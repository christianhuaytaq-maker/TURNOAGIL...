<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VentanillaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Pantalla Pública (FUERA del middleware auth)
Route::get('/pantalla-publica', function () {
    return view('pantalla.index');
})->name('pantalla-publica');

Route::middleware('auth')->group(function () {

    // Perfil (Todos pueden verlo)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Generar Turno (Todos pueden usarlo)
    Route::get('/generar-turno', [TurnoController::class, 'create'])->name('generar-turno');
    Route::post('/generar-turno', [TurnoController::class, 'store'])->name('turnos.store');

    // Panel de Atención (Admin y Trabajador)
    Route::get('/panel-atencion', [AtencionController::class, 'index'])->name('panel-atencion');
    Route::post('/panel-atencion/llamar', [AtencionController::class, 'llamar'])->name('panel-atencion.llamar');

    // ==========================================
    // SOLO PARA ADMINISTRADORES (rol_id == 1)
    // ==========================================
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
        Route::get('/ventanillas', [VentanillaController::class, 'index'])->name('ventanillas.index');
        Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    });

});

require __DIR__.'/auth.php';
