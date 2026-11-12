@extends('layouts.app')

@section('header', 'Nueva Ventanilla')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <form action="{{ route('ventanillas.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Número (Ej. V04)</label>
                <input type="text" name="numero" class="w-full border-gray-300 rounded shadow-sm" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nombre</label>
                <input type="text" name="nombre" class="w-full border-gray-300 rounded shadow-sm" placeholder="Ej. Ventanilla 04 - Licencias" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Ubicación</label>
                <input type="text" name="ubicacion" class="w-full border-gray-300 rounded shadow-sm" placeholder="Ej. Primer piso" required>
            </div>

            <div class="flex justify-end mt-6">
                <a href="{{ route('ventanillas.index') }}" class="text-gray-500 hover:underline mr-4 mt-2">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                    Guardar Ventanilla
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
