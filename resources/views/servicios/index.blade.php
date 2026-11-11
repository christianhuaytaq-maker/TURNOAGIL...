@extends('layouts.app')

@section('header', 'Gestión de Servicios')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-bold mb-4">Listado de Servicios</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($servicios as $servicio)
                <tr>
                    <td class="px-6 py-4">{{ $servicio->id }}</td>
                    <td class="px-6 py-4">{{ $servicio->nombre }}</td>
                    <td class="px-6 py-4">{{ $servicio->descripcion }}</td>
                    <td class="px-6 py-4">{{ $servicio->estado }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
