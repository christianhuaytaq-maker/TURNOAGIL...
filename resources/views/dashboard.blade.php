<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control Municipal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Tarjetas de Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <h3 class="text-gray-500 text-sm font-semibold">Turnos Hoy</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <h3 class="text-gray-500 text-sm font-semibold">Atendidos</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <h3 class="text-gray-500 text-sm font-semibold">En Espera</h3>
                    <p class="text-3xl font-bold text-gray-800">0</p>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <h3 class="text-gray-500 text-sm font-semibold">Ventanillas Activas</h3>
                    <p class="text-3xl font-bold text-gray-800">5</p>
                </div>
            </div>

            <!-- Bienvenida -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-bold mb-2">¡Bienvenido a TURNOÁGIL!</h3>
                    <p class="text-gray-600">Este es el sistema de gestión de turnos para la Municipalidad. Desde aquí podrás administrar los servicios, las ventanillas y monitorear la atención ciudadana en tiempo real.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
