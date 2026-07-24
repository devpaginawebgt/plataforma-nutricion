<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">Confirmar contraseña</h1>
        <p class="text-sm text-muted mt-1">
            Esta es un área segura. Confirma tu contraseña para continuar.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
        @csrf

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

        <x-primary-button class="w-full justify-center">
            Confirmar
        </x-primary-button>
    </form>
</x-guest-layout>
