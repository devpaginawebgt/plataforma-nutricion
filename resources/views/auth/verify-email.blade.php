<x-guest-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-strong">Verifica tu correo</h1>
        <p class="text-sm text-muted mt-1">
            Te enviamos un enlace de verificación al correo con el que te registraste.
            Ábrelo para activar tu cuenta. Si no lo recibiste, podemos enviártelo de nuevo.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
            Enviamos un nuevo enlace de verificación al correo de tu cuenta.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
        @csrf

        <x-primary-button class="w-full justify-center">
            Reenviar correo de verificación
        </x-primary-button>
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-6 text-center">
        @csrf

        <button type="submit"
            class="text-sm font-medium text-primary-700 hover:text-primary-800 dark:text-primary-400 dark:hover:text-primary-300">
            Cerrar sesión
        </button>
    </form>
</x-guest-layout>
