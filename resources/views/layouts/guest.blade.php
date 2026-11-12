<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'TURNOÁGIL') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-900 text-gray-900 m-0 p-0 overflow-hidden">
        <!-- Aquí inyectamos la vista directamente sin contenedores que la aplasten -->
        {{ $slot }}
    </body>
</html>
