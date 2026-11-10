<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('servicios.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nombre del Servicio</label>
                        <input type="text" name="nombre" class="w-full border-gray-300 rounded shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Código (Ej. MP, RC)</label>
                        <input type="text" name="codigo" class="w-full border-gray-300 rounded shadow-sm" maxlength="10" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tiempo Estimado (minutos)</label>
                        <input type="number" name="tiempo_estimado" class="w-full border-gray-300 rounded shadow-sm" value="15" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" class="w-full border-gray-300 rounded shadow-sm" rows="3"></textarea>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('servicios.index') }}" class="text-gray-500 hover:underline mr-4 mt-2">Cancelar</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700">
                            Guardar Servicio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
