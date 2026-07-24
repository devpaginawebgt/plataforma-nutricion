@php

$two_days = today()->addDays(2)->format('Y-m-d');
$past_date = today()->subDays(12)->format('Y-m-d');

$citas = [
    $two_days => [
        [
            'id' => 1,
            'nutricionista' => 'Dra. Ana María Castillo',
            'appointment_date' => $two_days.' 10:30:00',
            'motivo' => 'Control nutricional mensual',
            'modalidad' => 'Presencial',
            'state' => 'pending',
        ],
    ],
    $past_date => [
        [
            'id' => 2,
            'nutricionista' => 'Dra. Ana María Castillo',
            'appointment_date' => $past_date.' 09:00:00',
            'motivo' => 'Consulta inicial y evaluación',
            'modalidad' => 'Presencial',
            'state' => 'completed',
        ],
    ],
];

$stateBadges = [
    'pending'   => ['label' => 'Pendiente',  'classes' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300'],
    'completed' => ['label' => 'Completada', 'classes' => 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300'],
    'canceled'  => ['label' => 'Cancelada',  'classes' => 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300'],
];
@endphp

<x-app-layout>
    <x-slot name="header">Mis citas</x-slot>

    {{-- Encabezado --}}
    <div class="text-center sm:text-left mb-6">
        <h1 class="text-xl font-bold text-strong sm:text-2xl">Mis citas</h1>
        <p class="text-sm text-muted mt-1">
            Consulta tus próximas citas y el historial de consultas anteriores.
        </p>
    </div>

    {{-- Filtro de fechas --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end">
        <div class="w-full sm:w-auto">
            <x-input-label for="appointments-date-filter" value="Período" class="text-xs" />
            <x-select id="appointments-date-filter" class="mt-1 min-w-36 bg-white dark:bg-gray-800">
                <option value="week">Esta semana</option>
                <option value="fortnight">Esta quincena</option>
                <option value="month">Este mes</option>
                <option value="custom">Rango de fechas</option>
            </x-select>
        </div>

        {{-- Inputs de rango personalizado (ocultos por defecto) --}}
        <div id="appointments-custom-range" class="hidden w-full flex-col gap-3 sm:w-auto sm:flex-row sm:items-end">
            <div class="w-full sm:w-auto">
                <x-input-label for="appointments-date-from" value="Fecha inicio" class="text-xs" />
                <x-text-input id="appointments-date-from" type="date" class="mt-1 text-sm bg-white dark:bg-gray-800" />
            </div>
            <div class="w-full sm:w-auto">
                <x-input-label for="appointments-date-to" value="Fecha fin" class="text-xs" />
                <x-text-input id="appointments-date-to" type="date" class="mt-1 text-sm bg-white dark:bg-gray-800" />
            </div>
        </div>

        <div class="w-full sm:w-auto">
            <x-input-label for="appointments-state-filter" value="Estado" class="text-xs" />
            <x-select id="appointments-state-filter" class="mt-1 min-w-36 bg-white dark:bg-gray-800">
                <option value="pending">Pendientes</option>
                <option value="completed">Completadas</option>
                <option value="canceled">Canceladas</option>
            </x-select>
        </div>
    </div>

    {{-- Listado de citas (timeline) --}}
    <div class="mt-8 space-y-10">
        @foreach ($citas as $fecha => $appointments)
            @php
                $carbonDate = \Carbon\Carbon::parse($fecha);
                $groupLabel = match (true) {
                    $carbonDate->isToday() => 'Hoy',
                    $carbonDate->isTomorrow() => 'Mañana',
                    $carbonDate->isYesterday() => 'Ayer',
                    $carbonDate->isPast() => 'Hace '.$carbonDate->diffInDays(today()).' días',
                    default => 'En '.today()->diffInDays($carbonDate).' días',
                };
                $formattedDate = $carbonDate->locale('es')->isoFormat('dddd D [de] MMMM');
                $count = count($appointments);
            @endphp

            <section>
                {{-- Header del grupo de fecha --}}
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-baseline gap-2 flex-wrap">
                        <h3 class="text-sm font-bold text-strong uppercase tracking-wider">{{ $groupLabel }}</h3>
                        <span class="text-sm text-muted">·</span>
                        <span class="text-sm text-muted capitalize">{{ $formattedDate }}</span>
                        <span class="text-sm text-muted">·</span>
                        <span class="text-sm text-muted">{{ $count }} {{ $count === 1 ? 'cita' : 'citas' }}</span>
                    </div>
                    <div class="flex-1 border-t border-gray-200 dark:border-gray-700"></div>
                </div>

                {{-- Timeline --}}
                <div class="space-y-4 py-2 sm:ml-24 sm:border-l sm:border-gray-200 dark:border-gray-700">
                    @foreach ($appointments as $cita)
                        @php
                            $time = \Carbon\Carbon::parse($cita['appointment_date']);
                            $isPending = $cita['state'] === 'pending';
                        @endphp

                        <div class="relative sm:pl-8">
                            {{-- Hora mobile: dot + hora inline encima de la card --}}
                            <div class="mb-2 flex items-center gap-2 sm:hidden">
                                <span class="w-2.5 h-2.5 rounded-full bg-primary-500 shrink-0"></span>
                                <span class="text-sm font-semibold text-strong">{{ $time->format('h:i') }}</span>
                                <span class="text-xs text-muted uppercase">{{ $time->format('A') }}</span>
                            </div>

                            {{-- Hora desktop: absolute a la izquierda del border --}}
                            <div class="hidden sm:absolute sm:right-full sm:top-1 sm:mr-6 sm:w-20 sm:flex sm:flex-col sm:items-end">
                                <div class="text-sm font-semibold text-strong leading-tight">{{ $time->format('h:i') }}</div>
                                <div class="text-xs text-muted uppercase">{{ $time->format('A') }}</div>
                            </div>

                            {{-- Dot sobre la línea (solo desktop) --}}
                            <div class="hidden absolute -left-1.5 top-2 w-3 h-3 rounded-full bg-primary-500 ring-4 ring-gray-50 dark:ring-gray-900 sm:block"></div>

                            {{-- Card --}}
                            <div class="shadow-card border-card rounded-default bg-surface p-4">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <h4 class="text-base font-semibold text-strong truncate">{{ $cita['nutricionista'] }}</h4>
                                            @php $badge = $stateBadges[$cita['state']]; @endphp
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $badge['classes'] }}">
                                                {{ $badge['label'] }}
                                            </span>
                                        </div>

                                        <p class="text-sm text-body mt-0.5">{{ $cita['motivo'] }}</p>

                                        <div class="mt-2 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-muted">
                                            <span class="inline-flex items-center gap-1.5">
                                                <span class="icon-[lucide--map-pin] w-4 h-4"></span>
                                                {{ $cita['modalidad'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex gap-1.5 shrink-0">
                                        {{-- <x-button variant="soft" color="info" size="sm" icon="eye" iconOnly title="Ver detalles" /> --}}
                                        @if ($isPending)
                                            <x-button variant="soft" color="danger" size="sm" icon="x" iconOnly title="Cancelar cita" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>

    <script type="module">
        $(function () {
            const $filter = $('#appointments-date-filter');
            const $customRange = $('#appointments-custom-range');

            $filter.on('change', function () {
                if ($(this).val() === 'custom') {
                    $customRange.removeClass('hidden').addClass('flex');
                } else {
                    $customRange.addClass('hidden').removeClass('flex');
                }
            });
        });
    </script>
</x-app-layout>
