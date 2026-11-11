@extends('layouts.app')

@section('header', 'Generar Turno')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg max-w-xl mx-auto mt-10">
    <div class="p-6 text-gray-900 text-center">

        <!-- Mensaje de éxito con el número de turno -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 text-lg font-bold">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="text-2xl font-bold mb-6">Bienvenido a la Municipalidad</h3>
        <p class="text-gray-600 mb-8">Seleccione el trámite que desea realizar para generar su turno.</p>

        <form action="{{ route('turnos.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <select name="servicio_id" class="shadow border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-lg" required>
                    <option value="">Seleccione un servicio...</option>
                    @foreach($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline text-lg w-full">
                🎫 Generar Turno
            </button>
        </form>

    </div>
</div>
@endsection
