<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">Crear cuenta</h1>
        <p class="text-sm text-muted mt-1">Regístrate para acceder a tu portal de nutrición.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="name" value="Nombre completo" />
            <div class="relative mt-1">
                <span class="icon-[lucide--user] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="name" class="block w-full pl-10" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <div class="relative mt-1">
                <span class="icon-[lucide--mail] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email')" required autocomplete="username" />
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
                    required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
            <div class="relative mt-1">
                <span class="icon-[lucide--lock] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="password_confirmation" class="block w-full pl-10"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            Crear cuenta
        </x-primary-button>
    </form>

    <p class="text-sm text-muted text-center mt-6">
        ¿Ya tienes cuenta?
        <a href="{{ route('login') }}"
            class="font-medium text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300">
            Inicia sesión
        </a>
    </p>
</x-guest-layout>
