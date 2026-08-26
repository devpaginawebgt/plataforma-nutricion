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
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
            <x-nutritionist-dashboard::stat-card
                label="Pacientes activos"
                value="45"
                icon="users"
                color="primary"
                href="{{ route('patients.index') }}"
            />
            <x-nutritionist-dashboard::stat-card
                label="Pacientes Inactivos"
                value="5"
                icon="user-round-arrow-left"
                color="purple"
                href="{{ route('patients.index') }}"
            />
            <x-nutritionist-dashboard::stat-card
                label="Citas de hoy"
                value="6"
                icon="calendar"
                color="blue"
                href="{{ route('appointments.index') }}"
            />
            <x-nutritionist-dashboard::stat-card
                label="Seguimientos pendientes"
                value="8"
                icon="clock"
                color="orange"
                href="{{ route('patients.index') }}"
            />
        </div>

        {{-- Alertas --}}
        <div>
            <h3 class="text-lg font-semibold text-strong mb-3">Alertas</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                <x-nutritionist-dashboard::alert-card
                    message="3 pacientes no asistieron a su cita"
                    icon="user-x"
                    color="red"
                />
                <x-nutritionist-dashboard::alert-card
                    message="4 pacientes requieren actualización de dieta"
                    icon="clipboard-list"
                    color="yellow"
                />
                <x-nutritionist-dashboard::alert-card
                    message="3 pacientes pendientes de programar cita"
                    icon="calendar-clock"
                    color="yellow"
                />
                <x-nutritionist-dashboard::alert-card
                    message="¡1 paciente cumple años el día de hoy!"
                    icon="calendar-check"
                    color="blue"
                />
            </div>
        </div>

        {{-- Gráficas --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2">
                <x-nutritionist-dashboard::progress-chart />
            </div>
            
            <x-nutritionist-dashboard::progress-ring
                label="Porcentaje de meta alcanzado"
                value="80"
            />
        </div>
    </div>
</x-app-layout>
