<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TURNOÁGIL') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen flex">

            <!-- Sidebar -->
            <aside class="w-64 bg-slate-900 text-white flex flex-col">
                <div class="h-16 flex items-center justify-center bg-slate-950 font-bold text-xl tracking-wider">
                    TURNOÁGIL
                </div>
                <nav class="flex-1 px-4 py-6 space-y-2">
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-slate-800 {{ request()->routeIs('dashboard') ? 'bg-slate-800' : '' }}">
                        📊 Dashboard
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">
                        🎫 Generar Turno
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">
                        🖥️ Panel de Atención
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">
                        📺 Pantalla Pública
                    </a>
                    <div class="pt-4 pb-2 text-xs font-semibold text-slate-400 uppercase">Administración</div>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">🏢 Servicios</a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">🪟 Ventanillas</a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-slate-800">👥 Usuarios</a>
                </nav>

                <!-- Perfil y Logout -->
                <div class="p-4 bg-slate-950 border-t border-slate-800">
                    <div class="mb-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</p>
                        <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-sm text-red-400 hover:bg-slate-800 rounded">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col">
                <!-- Header -->
                <header class="bg-white shadow-sm h-16 flex items-center px-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @yield('header', 'Panel de Control')
                    </h2>
                </header>

                <!-- Page Content -->
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
