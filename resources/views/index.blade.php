<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Servicios Municipales') }}
            </h2>
            <a href="{{ route('servicios.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
                + Nuevo Servicio
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-600">
                            <th class="p-3">Código</th>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Tiempo Est.</th>
                            <th class="p-3">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servicios as $servicio)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3 font-bold">{{ $servicio->codigo }}</td>
                            <td class="p-3">
                                {{ $servicio->nombre }}
                                <p class="text-xs text-gray-500">{{ $servicio->descripcion }}</p>
                            </td>
                            <td class="p-3">{{ $servicio->tiempo_estimado }} min</td>
                            <td class="p-3">
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs uppercase">{{ $servicio->estado }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
