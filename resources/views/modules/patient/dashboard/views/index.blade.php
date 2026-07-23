<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-strong">Inicio / Dashboard</h2>
    </x-slot>

    <div>
        <h1 class="text-2xl font-bold text-strong">
            ¡Hola, {{ Auth::user()->name }}! 👋
        </h1>
        <p class="text-sm text-muted mt-1">
            Bienvenido a tu portal de nutrición.
        </p>
    </div>
</x-app-layout>
