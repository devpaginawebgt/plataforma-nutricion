<x-app-layout>
    <x-slot name="header">Inicio / Dashboard</x-slot>

    <div class="space-y-6">
        {{-- Saludo --}}
        <div>
            <h1 class="text-2xl font-bold text-strong">
                ¡Hola, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-sm text-muted mt-1">
                Este es el resumen general de tu consultorio.
            </p>
        </div>

        {{-- Stat cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-nutritionist-dashboard::stat-card label="Pacientes activos" value="45" icon="users" color="primary" />
            <x-nutritionist-dashboard::stat-card label="Citas de hoy" value="6" icon="calendar" color="blue" />
            <x-nutritionist-dashboard::stat-card label="Seguimientos pendientes" value="8" icon="clock" color="orange" />
            <x-nutritionist-dashboard::stat-card label="Planes nutricionales activos" value="32" icon="clipboard-list" color="purple" />
        </div>

        {{-- Alertas --}}
        <div>
            <h3 class="text-lg font-semibold text-strong mb-3">Alertas</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-nutritionist-dashboard::alert-card message="3 pacientes no asistieron" icon="user-x" color="red" />
                <x-nutritionist-dashboard::alert-card message="4 pacientes requieren actualización de dieta" icon="clipboard-list" color="yellow" />
                <x-nutritionist-dashboard::alert-card message="5 próximos controles en los siguientes 7 días" icon="calendar-check" color="blue" />
            </div>
        </div>

        {{-- Gráficas --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <x-nutritionist-dashboard::progress-chart />
            </div>
            
            <x-nutritionist-dashboard::progress-ring value="72" />
        </div>
    </div>
</x-app-layout>
