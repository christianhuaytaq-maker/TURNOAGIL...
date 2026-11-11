@extends('layouts.app')

@section('header', 'Panel de Control')

@section('content')
<div class="space-y-6">

    <!-- Tarjetas de Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Turnos en Espera -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">En Espera</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $turnosEspera }}</h3>
            </div>
            <div class="bg-yellow-100 p-3 rounded-full text-yellow-600 text-2xl">⏳</div>
        </div>

        <!-- Turnos Atendidos -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Atendidos Hoy</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $turnosAtendidos }}</h3>
            </div>
            <div class="bg-green-100 p-3 rounded-full text-green-600 text-2xl">✅</div>
        </div>

        <!-- Total Servicios -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Servicios Activos</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $totalServicios }}</h3>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600 text-2xl">🏢</div>
        </div>

        <!-- Total Ventanillas -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500 flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase">Ventanillas</p>
                <h3 class="text-3xl font-bold text-gray-800">{{ $totalVentanillas }}</h3>
            </div>
            <div class="bg-purple-100 p-3 rounded-full text-purple-600 text-2xl">🪟</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Últimos Turnos -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Últimos Turnos Generados</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Código</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Servicio</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Hora</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($ultimosTurnos as $turno)
                            <tr>
                                <td class="px-4 py-3 font-bold text-blue-600">{{ $turno->codigo }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $turno->servicio->nombre ?? 'N/A' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-500">{{ $turno->created_at->format('H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-4 text-center text-gray-500">No hay turnos generados aún.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Accesos Rápidos -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Accesos Rápidos</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('generar-turno') }}" class="flex flex-col items-center justify-center p-6 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors border border-blue-200">
                    <span class="text-3xl mb-2">🎫</span>
                    <span class="text-sm font-semibold text-blue-700">Generar Turno</span>
                </a>
                <a href="{{ route('panel-atencion') }}" class="flex flex-col items-center justify-center p-6 bg-green-50 hover:bg-green-100 rounded-lg transition-colors border border-green-200">
                    <span class="text-3xl mb-2">🖥️</span>
                    <span class="text-sm font-semibold text-green-700">Panel de Atención</span>
                </a>
                <a href="{{ route('servicios.index') }}" class="flex flex-col items-center justify-center p-6 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors border border-purple-200">
                    <span class="text-3xl mb-2">🏢</span>
                    <span class="text-sm font-semibold text-purple-700">Servicios</span>
                </a>
                <a href="{{ route('pantalla-publica') }}" target="_blank" class="flex flex-col items-center justify-center p-6 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors border border-orange-200">
                    <span class="text-3xl mb-2">📺</span>
                    <span class="text-sm font-semibold text-orange-700">Pantalla Pública</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
