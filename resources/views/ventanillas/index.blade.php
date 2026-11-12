@extends('layouts.app')

@section('header', 'Gestión de Ventanillas')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Listado de Ventanillas</h3>
            <!-- BOTÓN CORREGIDO AQUÍ -->
            <a href="{{ route('ventanillas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Nueva Ventanilla
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ubicación</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($ventanillas as $ventanilla)
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
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('ventanillas.edit', $ventanilla) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                        <form action="{{ route('ventanillas.destroy', $ventanilla) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta ventanilla?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No hay ventanillas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
