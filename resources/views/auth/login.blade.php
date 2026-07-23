<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">Iniciar sesión</h1>
        <p class="text-sm text-muted mt-1">Tu consultorio, siempre a mano.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <div class="relative mt-1">
                <span class="icon-[lucide--mail] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Contraseña" />
            <div class="relative mt-1">
                <span class="icon-[lucide--lock] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="password" class="block w-full pl-10"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded-input border-gray-300 dark:border-gray-600 text-primary-600 shadow-sm focus:ring-primary-500 dark:bg-gray-700"
                    name="remember">
                <span class="ms-2 text-sm text-muted">Recuérdame</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 rounded-default"
                    href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <x-primary-button class="w-full justify-center">
            Ingresar
        </x-primary-button>
    </form>

    @if (Route::has('register'))
        <p class="text-sm text-muted text-center mt-6">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}"
                class="font-medium text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300">
                Regístrate
            </a>
        </p>
    @endif
</x-guest-layout>
