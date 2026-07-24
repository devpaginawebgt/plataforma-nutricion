<x-app-layout>
    <x-slot name="header">Mi plan nutricional</x-slot>

    <div class="mb-4">
        <h1 class="text-2xl font-bold text-strong">Mi plan nutricional</h1>
        <p class="text-sm text-muted mt-1">
            Consulta el plan alimenticio que tu nutricionista ha definido para ti.
        </p>
    </div>

    <x-shared::nutrition-plan :showHeader="false" />
</x-app-layout>
