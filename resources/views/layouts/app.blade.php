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
    <body class="font-sans antialiased bg-slate-50">
        <div class="min-h-screen flex">

            <!-- Sidebar -->
            <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-xl z-10 relative">
                <div class="h-16 flex items-center justify-center bg-slate-950 font-bold text-2xl tracking-widest text-blue-400 border-b border-slate-800">
                    TURNOÁGIL
                </div>

                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">

                    <!-- SOLO ADMINISTRADOR (Rol 1) -->
                    @if(Auth::user()->rol_id == 1)
                        <a href="{{ route('dashboard') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('dashboard') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            📊 Dashboard
                        </a>
                    @endif

                    <!-- ADMINISTRADOR Y CIUDADANO (Roles 1 y 3) -->
                    @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 3)
                        <a href="{{ route('generar-turno') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('generar-turno') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            🎫 Generar Turno
                        </a>
                    @endif

                    <!-- ADMINISTRADOR Y TRABAJADOR (Roles 1 y 2) -->
                    @if(Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2)
                        <a href="{{ route('panel-atencion') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('panel-atencion') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            🖥️ Panel de Atención
                        </a>
                    @endif

                    <a href="{{ route('pantalla-publica') }}" target="_blank" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 text-slate-300">
                        📺 Pantalla Pública
                    </a>

                    <!-- SOLO ADMINISTRADOR (Rol 1) -->
                    @if(Auth::user()->rol_id == 1)
                        <div class="pt-6 pb-2 text-xs font-bold text-slate-500 uppercase tracking-wider">Administración</div>

                        <a href="{{ route('servicios.index') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('servicios.*') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            🏢 Servicios
                        </a>
                        <a href="{{ route('ventanillas.index') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('ventanillas.*') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            🪟 Ventanillas
                        </a>
                        <a href="{{ route('usuarios.index') }}" class="block px-4 py-3 rounded-lg transition-colors hover:bg-slate-800 {{ request()->routeIs('usuarios.*') ? 'bg-slate-800 text-blue-400 font-semibold' : 'text-slate-300' }}">
                            👥 Usuarios
                        </a>
                    @endif
                </nav>

                <!-- Perfil y Logout -->
                <div class="p-4 bg-slate-950 border-t border-slate-800">
                    <div class="mb-4 flex items-center gap-3">
                        <div class="h-10 w-10 rounded-full bg-blue-600 flex items-center justify-center font-bold text-lg text-white">
                            {{ substr(Auth::user()->nombres, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-white truncate w-32">{{ Auth::user()->nombres }} {{ Auth::user()->apellidos }}</p>
                            <p class="text-xs text-slate-400 truncate w-32">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 rounded-lg transition-colors">
                            🚪 Cerrar Sesión
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col h-screen overflow-hidden">
                <!-- Header -->
                <header class="bg-white shadow-sm h-16 flex items-center px-8 border-b border-gray-200">
                    <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                        @yield('header', 'Panel de Control')
                    </h2>
                </header>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-8">
                    <div class="max-w-7xl mx-auto">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
