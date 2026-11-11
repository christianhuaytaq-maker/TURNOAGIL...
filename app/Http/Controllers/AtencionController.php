<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Ventanilla;
use App\Events\NuevoTurnoGenerado; // Reutilizamos el evento o creamos uno nuevo
use Illuminate\Http\Request;

class AtencionController extends Controller
{
    public function index()
    {
        // Traemos los turnos en espera ordenados por llegada
        $turnosEspera = Turno::where('estado', 'espera')->orderBy('created_at', 'asc')->get();
        $ventanillas = Ventanilla::all();

        return view('atencion.index', compact('turnosEspera', 'ventanillas'));
    }

    public function llamar(Request $request)
    {
        $request->validate([
            'turno_id' => 'required|exists:turnos,id',
            'ventanilla_id' => 'required|exists:ventanillas,id'
        ]);

        $turno = Turno::find($request->turno_id);
        $turno->estado = 'atendiendo';
        $turno->ventanilla_id = $request->ventanilla_id;
        $turno->save();

        // Aquí podríamos disparar otro evento para avisar que están llamando al turno

        return redirect()->back()->with('success', "Llamando al turno {$turno->codigo} en la ventanilla {$turno->ventanilla->numero}");
    }
}
