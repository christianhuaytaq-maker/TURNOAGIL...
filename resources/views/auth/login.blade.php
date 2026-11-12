<x-guest-layout>
    <!-- Fondo principal con gradiente profundo y cuadrícula sutil -->
    <div class="min-h-screen w-full flex bg-slate-950 relative overflow-hidden">

        <!-- Efecto de cuadrícula de fondo (estilo técnico/ingeniería) -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>

        <!-- Luces de fondo (Glow) -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl"></div>

        <!-- Lado Izquierdo: Branding Premium -->
        <div class="hidden md:flex md:w-1/2 relative z-10 flex-col justify-center items-center p-12 border-r border-slate-800/50 bg-slate-900/40 backdrop-blur-sm">
            <div class="text-center transform hover:scale-105 transition-transform duration-500">
                <div class="w-24 h-24 mx-auto bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center text-5xl shadow-lg shadow-blue-500/30 mb-8">
                    🏛️
                </div>
                <h1 class="text-5xl font-black text-white tracking-widest mb-3 bg-clip-text text-transparent bg-gradient-to-r from-white to-slate-400">
                    TURNOÁGIL
                </h1>
                <p class="text-blue-400 text-lg font-semibold tracking-wide uppercase">Sistema de Gestión de Turnos</p>
                <div class="mt-10 flex items-center justify-center gap-4">
                    <span class="h-px w-12 bg-slate-700"></span>
                    <span class="text-slate-500 text-sm font-medium">Municipalidad de tu Ciudad</span>
                    <span class="h-px w-12 bg-slate-700"></span>
                </div>
            </div>
        </div>

        <!-- Lado Derecho: Formulario con Efecto Cristal -->
        <div class="w-full md:w-1/2 relative z-10 flex items-center justify-center p-6 sm:p-12">

            <!-- Botones superiores -->
            <div class="absolute top-8 right-8 flex gap-6">
                <a href="{{ route('login') }}" class="text-blue-400 hover:text-white font-bold transition text-sm tracking-wider uppercase">Login</a>
                <a href="{{ route('register') }}" class="text-slate-400 hover:text-white font-bold transition text-sm tracking-wider uppercase">Registrarse</a>
            </div>

            <!-- Tarjeta del Formulario (Glassmorphism) -->
            <div class="w-full max-w-md bg-slate-900/60 backdrop-blur-xl rounded-3xl shadow-2xl border border-slate-700/50 p-8 sm:p-10">
                <div class="mb-10 text-center">
                    <h2 class="text-3xl font-bold text-white">Bienvenido de nuevo</h2>
                    <p class="text-slate-400 text-sm mt-2">Ingresa tus credenciales para acceder al sistema.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Correo Electrónico</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-800/50 border border-slate-600 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="admin@turnoagil.com">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Contraseña</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-500">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="current-password"
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-800/50 border border-slate-600 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="••••••••">
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me" type="checkbox" class="rounded bg-slate-800 border-slate-600 text-blue-500 shadow-sm focus:ring-blue-500 focus:ring-offset-slate-900" name="remember">
                            <span class="ml-2 text-sm text-slate-400 group-hover:text-slate-300 transition-colors">Recordarme</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-blue-400 hover:text-blue-300 font-medium hover:underline transition-colors" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-bold text-lg rounded-xl shadow-lg shadow-blue-500/30 transform hover:-translate-y-1 transition-all duration-200 flex justify-center items-center gap-2">
                            <span>INGRESAR AL SISTEMA</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
