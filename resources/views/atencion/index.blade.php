@extends('layouts.app')

@section('header', 'Panel de Atención')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <h3 class="text-xl font-bold mb-4">Turnos en Espera</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($turnosEspera as $turno)
            <div class="border p-4 rounded-lg shadow bg-gray-50">
                <h4 class="text-2xl font-bold text-blue-600">{{ $turno->codigo }}</h4>
                <p class="text-sm text-gray-600">Servicio: {{ $turno->servicio->nombre }}</p>

                <form action="{{ route('panel-atencion.llamar') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="turno_id" value="{{ $turno->id }}">
                    <select name="ventanilla_id" class="border rounded p-2 w-full mb-2" required>
                        <option value="">Seleccione ventanilla...</option>
                        @foreach($ventanillas as $ventanilla)
                            <option value="{{ $ventanilla->id }}">{{ $ventanilla->numero }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-blue-600 text-white w-full py-2 rounded hover:bg-blue-700">
                        📢 Llamar Turno
                    </button>
                </form>
            </div>
        @empty
            <p class="text-gray-500">No hay turnos en espera.</p>
        @endforelse
    </div>
</div>
@endsection
