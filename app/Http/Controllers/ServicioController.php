<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function index()
    {
        // Traemos los servicios usando el Query Builder para no depender de un modelo aún
        $servicios = DB::table('servicios')->orderBy('id', 'desc')->get();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:120|unique:servicios',
            'descripcion' => 'nullable|string',
            'codigo' => 'required|string|max:10|unique:servicios',
            'tiempo_estimado' => 'required|integer|min:1',
        ]);

        DB::table('servicios')->insert([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'codigo' => strtoupper($request->codigo),
            'tiempo_estimado' => $request->tiempo_estimado,
            'estado' => 'activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio creado correctamente.');
    }
}
