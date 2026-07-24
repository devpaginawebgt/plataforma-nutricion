<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">¿Olvidaste tu contraseña?</h1>
        <p class="text-sm text-muted mt-1">
            Ingresa tu correo y te enviaremos un enlace para restablecerla.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <div class="relative mt-1">
                <span class="icon-[lucide--mail] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            Enviar enlace de restablecimiento
        </x-primary-button>
    </form>

    <p class="text-sm text-muted text-center mt-6">
        <a href="{{ route('login') }}"
            class="font-medium text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300">
            Volver a iniciar sesión
        </a>
    </p>
</x-guest-layout>
