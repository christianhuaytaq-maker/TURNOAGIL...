<?php

namespace App\Http\Controllers;

use App\Models\Ventanilla;
use Illuminate\Http\Request;

class VentanillaController extends Controller
{
    public function index()
    {
        $ventanillas = Ventanilla::all();
        return view('ventanillas.index', compact('ventanillas'));
    }

    public function create()
    {
        return view('ventanillas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|unique:ventanillas,numero',
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        Ventanilla::create([
            'numero' => $request->numero,
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'estado' => 'disponible'
        ]);

        return redirect()->route('ventanillas.index')->with('success', 'Ventanilla creada correctamente.');
    }

    public function edit(Ventanilla $ventanilla)
    {
        return view('ventanillas.edit', compact('ventanilla'));
    }

    public function update(Request $request, Ventanilla $ventanilla)
    {
        $request->validate([
            'numero' => 'required|string|unique:ventanillas,numero,' . $ventanilla->id,
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'estado' => 'required|string'
        ]);

        $ventanilla->update($request->all());

        return redirect()->route('ventanillas.index')->with('success', 'Ventanilla actualizada.');
    }

    public function destroy(Ventanilla $ventanilla)
    {
        $ventanilla->delete();
        return redirect()->route('ventanillas.index')->with('success', 'Ventanilla eliminada.');
    }
}
