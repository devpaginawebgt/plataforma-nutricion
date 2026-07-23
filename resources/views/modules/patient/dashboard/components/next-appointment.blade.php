@props([
    'fecha' => '29/07/2026',
    'hora' => '10:30 AM',
    'motivo' => 'Control nutricional mensual',
    'modalidad' => 'Presencial · Consultorio 3',
    'estado' => 'pendiente',
])

<div class="bg-surface rounded-default shadow-card border-card p-5">
    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-3">Próxima cita</p>

    <div class="flex flex-col sm:flex-row sm:items-center gap-4 rounded-default border-card bg-primary-50/40 dark:bg-primary-900/10 p-4">
        <div class="w-14 h-14 rounded-default bg-primary-700 text-white flex flex-col items-center justify-center shrink-0">
            <span class="icon-[lucide--calendar-days] w-6 h-6"></span>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-base font-bold text-strong">{{ $fecha }} · {{ $hora }}</p>
            <p class="text-sm text-body">{{ $motivo }}</p>
            <p class="text-xs text-muted flex items-center gap-1 mt-1">
                <span class="icon-[lucide--map-pin] w-3.5 h-3.5"></span>
                {{ $modalidad }}
            </p>
        </div>
        <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 dark:bg-yellow-900/40 text-yellow-700 dark:text-yellow-300 px-3 py-1 text-xs font-semibold shrink-0">
            <span class="icon-[lucide--hourglass] w-3.5 h-3.5"></span>
            {{ ucfirst($estado) }}
        </span>
    </div>
</div>
