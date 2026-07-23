@props([
    'nombre' => 'María López',
    'edad' => '45 años',
    'sexo' => 'Femenino',
    'gestacion' => 'N/A',
    'telefono' => '1234 5678',
    'correo' => 'maria.lopez@gmail.com',
    'ocupacion' => 'Contadora',
    'fechaNacimiento' => '15/03/1981',
])

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">

    <div class="grid grid-cols-1 md:grid-cols-2 divide-y divide-default md:divide-y-0">
        <div class="flex items-center gap-3 px-5 py-4 md:border-r md:border-default">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--user] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Nombre</p>
                <p class="text-sm font-medium text-strong truncate">{{ $nombre }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--mail] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Correo</p>
                <p class="text-sm font-medium text-strong truncate">{{ $correo }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4 md:border-r md:border-default">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--cake] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Edad</p>
                <p class="text-sm font-medium text-strong truncate">{{ $edad }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--briefcase] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Ocupación</p>
                <p class="text-sm font-medium text-strong truncate">{{ $ocupacion }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4 md:border-r md:border-default">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--venus] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Sexo</p>
                <p class="text-sm font-medium text-strong truncate">{{ $sexo }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--calendar] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Fecha de nacimiento</p>
                <p class="text-sm font-medium text-strong truncate">{{ $fechaNacimiento }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4 md:border-r md:border-default">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--clock] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Meses de gestación</p>
                <p class="text-sm font-medium text-strong truncate">{{ $gestacion }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 px-5 py-4">
            <div class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--phone] w-4 h-4"></span>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Teléfono</p>
                <p class="text-sm font-medium text-strong truncate">{{ $telefono }}</p>
            </div>
        </div>
    </div>
</div>
