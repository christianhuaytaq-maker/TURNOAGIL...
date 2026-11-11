@extends('layouts.app') <!-- Asegúrate que tu layout principal se llame app.blade.php -->

@section('header', 'Gestión de Ventanillas')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Listado de Ventanillas</h3>
            <!-- Aquí irá el botón de crear luego -->
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Nueva Ventanilla</a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($ventanillas as $ventanilla)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $ventanilla->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $ventanilla->numero }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $ventanilla->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $ventanilla->ubicacion }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $ventanilla->estado }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
