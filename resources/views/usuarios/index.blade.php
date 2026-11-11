@extends('layouts.app')

@section('header', 'Gestión de Usuarios')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h3 class="text-lg font-bold mb-4">Listado de Usuarios</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombres</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Apellidos</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($usuarios as $usuario)
                <tr>
                    <td class="px-6 py-4">{{ $usuario->id }}</td>
                    <td class="px-6 py-4">{{ $usuario->nombres }}</td>
                    <td class="px-6 py-4">{{ $usuario->apellidos }}</td>
                    <td class="px-6 py-4">{{ $usuario->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
