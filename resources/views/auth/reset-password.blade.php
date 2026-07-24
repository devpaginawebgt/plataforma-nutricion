<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">Restablecer contraseña</h1>
        <p class="text-sm text-muted mt-1">Elige una nueva contraseña para tu cuenta.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <div class="relative mt-1">
                <span class="icon-[lucide--mail] w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                <x-text-input id="email" class="block w-full pl-10" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" value="Nueva contraseña" />
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
                    name="password_confirmation"
                    required autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center">
            Restablecer contraseña
        </x-primary-button>
    </form>
</x-guest-layout>
