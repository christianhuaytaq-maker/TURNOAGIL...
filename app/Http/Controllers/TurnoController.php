<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Servicio;
use App\Events\NuevoTurnoGenerado;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    // 1. Muestra la vista para que el ciudadano saque su turno
    public function create()
    {
        $servicios = Servicio::all();
        return view('turnos.create', compact('servicios'));
    }

    // 2. Guarda el turno y dispara el WebSocket
    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id'
        ]);

        // Obtener el primer servicio para generar la letra (Ej: A)
        $servicio = Servicio::find($request->servicio_id);

        // Generar correlativo (Ej: A-001)
        $ultimoTurno = Turno::where('servicio_id', $request->servicio_id)->latest()->first();
        $numero = $ultimoTurno ? intval(substr($ultimoTurno->codigo, 2)) + 1 : 1;
        $codigo = 'A-' . str_pad($numero, 3, '0', STR_PAD_LEFT);

        // Guardar en la base de datos
        $turno = Turno::create([
            'codigo' => $codigo,
            'servicio_id' => $request->servicio_id,
            'estado' => 'espera'
        ]);

        // ¡DISPARAR EL WEBSOCKET PARA LA PANTALLA PÚBLICA!
        event(new NuevoTurnoGenerado($turno));

        return redirect()->back()->with('success', "Su turno generado es: $codigo");
    }
}
