<x-app-layout>
    <x-slot name="header">Inicio / Mi resumen</x-slot>

    <div class="space-y-6">
        {{-- Saludo --}}
        <div>
            <h1 class="text-2xl font-bold text-strong">
                ¡Hola, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-sm text-muted mt-1">
                Este es tu resumen de progreso.
            </p>
        </div>

        {{-- Peso inicial + peso actual + meta --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-patient-dashboard::weight-card
                label="Peso inicial"
                value="187"
                unit="lbs"
                date="15/01/2026"
                icon="flag"
                color="blue"
            />
            <x-patient-dashboard::weight-card
                label="Peso actual"
                value="172"
                unit="lbs"
                date="20/07/2026"
                icon="scale"
                color="primary"
            />
            <x-patient-dashboard::weight-card
                label="Meta de peso"
                value="159"
                unit="lbs"
                date="31/12/2026"
                icon="target"
                color="green"
            />
        </div>

        {{-- Gráfica de avance + progreso hacia la meta --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <x-patient-dashboard::weight-chart
                    :inicial="187"
                    :actual="170"
                    :meta="159"
                />
            </div>

            <x-patient-dashboard::weight-goal-progress
                :inicial="187"
                :actual="172"
                :meta="159"
            />
        </div>

        {{-- Próxima cita --}}
        <x-patient-dashboard::next-appointment />
    </div>
</x-app-layout>
