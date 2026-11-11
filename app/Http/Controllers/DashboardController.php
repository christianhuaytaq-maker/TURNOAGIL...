<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use App\Models\Ventanilla;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas para las tarjetas
        $turnosEspera = Turno::where('estado', 'espera')->count();
        $turnosAtendidos = Turno::where('estado', 'atendido')->count();
        $totalServicios = Servicio::count();
        $totalVentanillas = Ventanilla::count();

        // Últimos 5 turnos generados
        $ultimosTurnos = Turno::with('servicio')->latest()->take(5)->get();

        return view('dashboard', compact('turnosEspera', 'turnosAtendidos', 'totalServicios', 'totalVentanillas', 'ultimosTurnos'));
    }
}
