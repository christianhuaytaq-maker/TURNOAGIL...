<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-900">
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-blue-400 uppercase tracking-widest">TURNOÁGIL</h1>
            <p class="text-slate-400 mt-2">Crear nueva cuenta</p>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-slate-800 shadow-2xl overflow-hidden sm:rounded-2xl border border-slate-700">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-slate-300 mb-2">Nombre Completo</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-300 mb-2">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex items-center justify-between mt-6">
                    <a class="text-sm text-blue-400 hover:text-blue-300 hover:underline" href="{{ route('login') }}">
                        Ya tengo una cuenta
                    </a>
                    <button type="submit" class="py-3 px-6 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 transition-all">
                        REGISTRARSE
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
