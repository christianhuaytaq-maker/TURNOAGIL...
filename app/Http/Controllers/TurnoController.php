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

    // 2. Guarda el turno (Ciudadano saca ticket) y dispara el WebSocket
    public function store(Request $request)
    {
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id'
        ]);

        $servicio = Servicio::find($request->servicio_id);

        // Generar correlativo (Ej: A-001)
        $ultimoTurno = Turno::where('servicio_id', $request->servicio_id)->latest()->first();
        $numero = $ultimoTurno ? intval(substr($ultimoTurno->codigo, 2)) + 1 : 1;
        $codigo = 'A-' . str_pad($numero, 3, '0', STR_PAD_LEFT);

        $turno = Turno::create([
            'codigo' => $codigo,
            'servicio_id' => $request->servicio_id,
            'estado' => 'espera'
        ]);

        // Disparamos el evento (por si quieres que la pantalla muestre los que están en espera)
        event(new NuevoTurnoGenerado($turno));

        return redirect()->back()->with('success', "Su turno generado es: $codigo");
    }

    // 3. ¡ESTE ES EL MÉTODO QUE TE FALTA! (El que se ejecuta al presionar "Llamar Turno")
    public function llamarTurno(Request $request, $id)
    {
        // Buscamos el turno que se quiere llamar
        $turno = Turno::findOrFail($id);

        // Actualizamos su estado y le asignamos la ventanilla seleccionada en el dropdown
        $turno->estado = 'atendiendo';
        $turno->ventanilla_id = $request->ventanilla; // Asegúrate de que el select envíe este dato
        $turno->save();

        // ¡DISPARAMOS EL WEBSOCKET CON LOS DATOS ACTUALIZADOS!
        event(new NuevoTurnoGenerado($turno));

        return redirect()->back()->with('success', 'Llamando al turno ' . $turno->codigo);
    }
}
