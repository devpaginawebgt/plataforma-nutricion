@props([
    'proximaFecha' => '29/07/2026',
    'proximaHora' => '10:30 AM',
    'proximoMotivo' => 'Control nutricional mensual',
    'proximaModalidad' => 'Presencial',
    'historial' => [
        ['fecha' => '01/07/2026', 'hora' => '09:00 AM', 'motivo' => 'Evaluación de seguimiento', 'modalidad' => 'Presencial', 'estado' => 'asistio'],
        ['fecha' => '10/06/2026', 'hora' => '11:30 AM', 'motivo' => 'Ajuste de plan nutricional', 'modalidad' => 'Virtual', 'estado' => 'asistio'],
        ['fecha' => '15/05/2026', 'hora' => '04:15 PM', 'motivo' => 'Consulta inicial', 'modalidad' => 'Presencial', 'estado' => 'cancelada'],
        ['fecha' => '02/08/2026', 'hora' => '08:45 AM', 'motivo' => 'Revisión trimestral', 'modalidad' => 'Virtual', 'estado' => 'pendiente'],
    ],
])

@php
    $proximaCarbon = \Carbon\Carbon::createFromFormat('d/m/Y', $proximaFecha)->startOfDay();
    $proximaDiffDays = today()->diffInDays($proximaCarbon);
    $proximaDiaLabel = match (true) {
        $proximaCarbon->isToday() => 'Hoy',
        $proximaCarbon->isTomorrow() => 'Mañana',
        default => "En {$proximaDiffDays} días",
    };
    $proximaDiaSemana = $proximaCarbon->locale('es')->isoFormat('dddd');
@endphp

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">

    <div class="p-5 border-b border-default">
        <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-3">Próxima cita</p>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4 rounded-default border-card bg-primary-50/40 dark:bg-primary-900/10 p-4">
            <div class="w-14 h-14 rounded-default bg-primary-700 text-white flex flex-col items-center justify-center shrink-0">
                <span class="icon-[lucide--calendar-days] w-6 h-6"></span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-base font-bold text-primary-700 dark:text-primary-300 capitalize">{{ $proximaDiaSemana }} · {{ $proximaDiaLabel }}</p>
                <p class="text-xs text-muted">{{ $proximaFecha }} · {{ $proximaHora }}</p>
                <p class="text-sm text-body mt-1">{{ $proximoMotivo }}</p>
                <p class="text-xs text-muted flex items-center gap-1 mt-1">
                    <span class="icon-[lucide--map-pin] w-3.5 h-3.5"></span>
                    {{ $proximaModalidad }}
                </p>
            </div>
            <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 dark:bg-yellow-900/40 text-yellow-700 dark:text-yellow-300 px-3 py-1 text-xs font-semibold shrink-0">
                <span class="icon-[lucide--hourglass] w-3.5 h-3.5"></span>
                Pendiente
            </span>
        </div>
    </div>

    <div class="p-5">
        <div class="flex items-center gap-2 mb-3">
            <span class="icon-[lucide--history] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Historial de consultas</p>
        </div>

        <div class="divide-y divide-default rounded-default border-card overflow-hidden">
            @foreach ($historial as $cita)
                <div class="flex items-center justify-between gap-3 px-4 py-3">
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">{{ $cita['fecha'] }} · {{ $cita['hora'] }}</p>
                        <p class="text-xs text-muted truncate">{{ $cita['motivo'] }}</p>
                        <p class="text-xs text-muted flex items-center gap-1 mt-0.5">
                            <span class="icon-[lucide--map-pin] w-3 h-3"></span>
                            {{ $cita['modalidad'] }}
                        </p>
                    </div>

                    @if ($cita['estado'] === 'asistio')
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 px-3 py-1 text-xs font-semibold shrink-0">
                            <span class="icon-[lucide--circle-check] w-3.5 h-3.5"></span>
                            Asistió
                        </span>
                    @elseif ($cita['estado'] === 'pendiente')
                        <span class="inline-flex items-center gap-1 rounded-full bg-yellow-100 dark:bg-yellow-900/40 text-yellow-700 dark:text-yellow-300 px-3 py-1 text-xs font-semibold shrink-0">
                            <span class="icon-[lucide--hourglass] w-3.5 h-3.5"></span>
                            Pendiente
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 rounded-full bg-red-100 dark:bg-red-900/40 text-red-700 dark:text-red-300 px-3 py-1 text-xs font-semibold shrink-0">
                            <span class="icon-[lucide--circle-x] w-3.5 h-3.5"></span>
                            Cancelada
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
