<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Ventanilla;
use App\Events\NuevoTurnoGenerado;
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function index()
    {
        // Cargar los turnos en espera y las ventanillas
        $turnos = Turno::where('estado', 'espera')->orderBy('created_at', 'asc')->get();
        $ventanillas = Ventanilla::all();

        // CAMBIO AQUÍ: Usamos la ruta correcta de tu vista
        return view('ventanillas.index', compact('turnos', 'ventanillas'));
    }

    public function llamar(Request $request)
    {
        // 1. Validar que venga el turno y la ventanilla
        $request->validate([
            'turno_id' => 'required|exists:turnos,id',
            'ventanilla_id' => 'required|exists:ventanillas,id'
        ]);

        // 2. Buscar el turno y actualizarlo
        $turno = Turno::findOrFail($request->turno_id);
        $turno->estado = 'atendiendo';
        $turno->ventanilla_id = $request->ventanilla_id;
        $turno->save();

        // 3. Disparar el WebSocket
        event(new NuevoTurnoGenerado($turno));

        return redirect()->back()->with('success', 'Llamando al turno ' . $turno->codigo);
    }
}
