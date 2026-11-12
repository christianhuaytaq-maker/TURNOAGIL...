<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VentanillaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AtencionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// 1. La raíz ahora lleva directo a Generar Turno (Vista pública)
Route::get('/', function () {
    return redirect()->route('generar-turno');
});

// 2. Rutas Públicas (Sin login)
Route::get('/pantalla-publica', function () {
    return view('pantalla.index');
})->name('pantalla-publica');

Route::get('/generar-turno', [TurnoController::class, 'create'])->name('generar-turno');
Route::post('/generar-turno', [TurnoController::class, 'store'])->name('turnos.store');

// 3. Rutas para usuarios logueados (Admin y Trabajador)
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Panel de Atención
    Route::get('/panel-atencion', [AtencionController::class, 'index'])->name('panel-atencion');
    Route::post('/panel-atencion/llamar', [AtencionController::class, 'llamar'])->name('panel-atencion.llamar');

    // ==========================================
    // 4. SOLO PARA ADMINISTRADORES (Rol 1)
    // ==========================================
    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
        Route::resource('ventanillas', VentanillaController::class);
        Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    });

});

require __DIR__.'/auth.php';
