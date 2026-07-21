<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Inicio / Dashboard</h2>
    </x-slot>

    <div class="space-y-6">
        {{-- Saludo --}}
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                ¡Hola, {{ Auth::user()->name }}! 👋
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                Este es el resumen general de tu consultorio.
            </p>
        </div>

        {{-- Stat cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-dashboard::stat-card label="Pacientes activos" value="45" icon="users" color="primary" />
            <x-dashboard::stat-card label="Citas de hoy" value="6" icon="calendar" color="blue" />
            <x-dashboard::stat-card label="Seguimientos pendientes" value="8" icon="clock" color="orange" />
            <x-dashboard::stat-card label="Planes nutricionales activos" value="32" icon="clipboard-list" color="purple" />
        </div>

        {{-- Alertas --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Alertas</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <x-dashboard::alert-card message="3 pacientes no asistieron" icon="user-x" color="red" />
                <x-dashboard::alert-card message="4 pacientes requieren actualización de dieta" icon="clipboard-list" color="yellow" />
                <x-dashboard::alert-card message="5 próximos controles en los siguientes 7 días" icon="calendar-check" color="blue" />
            </div>
        </div>

        {{-- Gráficas --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <x-dashboard::progress-chart />
            </div>
            
            <x-dashboard::progress-ring value="72" />
        </div>
    </div>
</x-app-layout>
