@props([
    'agua' => 6,
    'ejercicio' => [
        'minutos' => 45,
        'frecuencia' => '4 veces/sem',
    ],
    'ejercicioFrecuenciaOpciones' => ['3 veces/sem', '4 veces/sem', '5+ veces/sem'],
    'sueno' => [
        'horas' => 7,
        'calidad' => 'Regular',
    ],
    'tiemposComida' => 5,
    'ocupacion' => [
        'puesto' => 'Contadora',
        'horario' => 'Lunes a viernes, 8:00 - 17:00',
    ],
    'alcohol' => [
        'consume' => 'Sí',
        'tipo' => 'Vino tinto ocasional (1 copa)',
    ],
    'tabaco' => [
        'fuma' => 'No',
        'cantidad' => 0,
        'frecuencia' => null,
    ],
    'adherencia' => 75,
    'calidadOpciones' => ['Buena', 'Regular', 'Mala'],
    'tiemposOpciones' => [1, 2, 3, 4, 5, 6],
    'frecuenciaOpciones' => ['Diario', 'Semanal', 'Mensual'],
    'recomendaciones' => [
        'Aumentar el consumo de verduras en cada tiempo de comida.',
        'Priorizar alimentos naturales y minimizar los ultraprocesados.',
        'Mantener una hidratación adecuada durante todo el día.',
        'Realizar actividad física de forma constante.',
        'Dormir lo suficiente y mantener una buena higiene del sueño.',
        'Reducir el consumo de azúcares añadidos y grasas saturadas.',
        'Planificar tus comidas para evitar saltarte tiempos de comida.',
        'Manejar el estrés con técnicas de relajación y respiración.',
    ],
])

@php
    $pill = function ($value, $selected) {
        $isActive = (string) $value === (string) $selected;
        $base = 'inline-flex items-center justify-center px-3 py-1.5 rounded-full text-xs font-semibold border transition';
        $active = 'bg-primary-700 text-white border-primary-700 shadow-sm';
        $idle = 'bg-surface text-muted border-soft';
        return $base . ' ' . ($isActive ? $active : $idle);
    };

    $valueBadge = 'inline-flex items-center justify-center min-w-12 px-3 py-1.5 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-800 dark:text-primary-100 text-sm font-bold';
@endphp

<div class="space-y-4">
    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--users] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <div>
                <h3 class="text-xl font-semibold text-strong">Hábitos</h3>
                <p class="text-xs text-muted">Registro de hábitos actuales del paciente.</p>
            </div>
        </div>

        <div class="divide-y divide-default">
            {{-- Agua pura --}}
            <div class="flex flex-col md:flex-row md:items-center gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:flex-1 min-w-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--droplet] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Agua pura (vasos)</p>
                        <p class="text-xs text-muted">¿Cuántos vasos al día?</p>
                    </div>
                </div>
                <div class="flex flex-col items-start md:items-end gap-1 shrink-0">
                    <span class="{{ $valueBadge }}">{{ $agua }}</span>
                    <span class="text-[11px] text-muted">Vasos (250 ml)</span>
                </div>
            </div>

            {{-- Ejercicio --}}
            <div class="flex flex-col md:flex-row md:items-start gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--dumbbell] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Ejercicio</p>
                        <p class="text-xs text-muted">Realizar ejercicio aeróbico y de fuerza.</p>
                    </div>
                </div>
                <div class="flex-1 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Minutos por sesión</p>
                        <span class="{{ $valueBadge }}">{{ $ejercicio['minutos'] }} min</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Días a la semana</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($ejercicioFrecuenciaOpciones as $opt)
                                <span class="{{ $pill($opt, $ejercicio['frecuencia']) }}">{{ $opt }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sueño --}}
            <div class="flex flex-col md:flex-row md:items-start gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--moon] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Sueño (horas)</p>
                    </div>
                </div>
                <div class="flex-1 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">¿Cuántas horas duermes?</p>
                        <span class="{{ $valueBadge }}">{{ $sueno['horas'] }} horas</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Calidad del sueño</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($calidadOpciones as $opt)
                                <span class="{{ $pill($opt, $sueno['calidad']) }}">{{ $opt }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tiempos de comida --}}
            <div class="flex flex-col md:flex-row md:items-center gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:flex-1 min-w-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--utensils] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Tiempos de comida</p>
                        <p class="text-xs text-muted">¿Cuántos tiempos de comida realizas al día?</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2 shrink-0">
                    @foreach ($tiemposOpciones as $opt)
                        <span class="{{ $pill($opt, $tiemposComida) }} min-w-9">{{ $opt }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Ocupación --}}
            <div class="flex flex-col md:flex-row md:items-start gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--briefcase] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Ocupación</p>
                    </div>
                </div>
                <div class="flex-1 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Ocupación</p>
                        <p class="text-sm font-medium text-strong">{{ $ocupacion['puesto'] }}</p>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Horario laboral</p>
                        <p class="text-sm font-medium text-strong">{{ $ocupacion['horario'] }}</p>
                    </div>
                </div>
            </div>

            {{-- Alcohol --}}
            <div class="flex flex-col md:flex-row md:items-start gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--wine] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Alcohol</p>
                    </div>
                </div>
                <div class="flex-1 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">¿Consumes alcohol?</p>
                        <div class="flex gap-2">
                            <span class="{{ $pill('Sí', $alcohol['consume']) }}">Sí</span>
                            <span class="{{ $pill('No', $alcohol['consume']) }}">No</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">¿Qué tipo?</p>
                        <p class="text-sm font-medium text-strong">{{ $alcohol['tipo'] }}</p>
                    </div>
                </div>
            </div>

            {{-- Tabaco --}}
            <div class="flex flex-col md:flex-row md:items-start gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--cigarette] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Tabaco</p>
                    </div>
                </div>
                <div class="flex-1 space-y-3">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">¿Fumas?</p>
                        <div class="flex gap-2">
                            <span class="{{ $pill('Sí', $tabaco['fuma']) }}">Sí</span>
                            <span class="{{ $pill('No', $tabaco['fuma']) }}">No</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">Cantidad</p>
                        <span class="{{ $valueBadge }}">{{ $tabaco['cantidad'] }}</span>
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                        <p class="text-xs text-muted">¿Con qué frecuencia?</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($frecuenciaOpciones as $opt)
                                <span class="{{ $pill($opt, $tabaco['frecuencia']) }}">{{ $opt }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Adherencia al plan --}}
            <div class="flex flex-col md:flex-row md:items-center gap-3 md:gap-5 px-5 py-4">
                <div class="flex items-start gap-3 md:w-64 shrink-0">
                    <span class="w-9 h-9 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--target] w-4 h-4"></span>
                    </span>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-strong">Adherencia al plan</p>
                        <p class="text-xs text-muted">¿Qué tan bien sigues tu plan?</p>
                    </div>
                </div>
                <div class="flex-1 flex items-center gap-3">
                    <div class="flex-1">
                        <div class="flex justify-between text-[11px] text-muted mb-1">
                            <span>0</span>
                            <span>50</span>
                            <span>100</span>
                        </div>
                        <div class="relative h-2 rounded-full bg-primary-100 dark:bg-primary-900/40 overflow-hidden">
                            <div class="absolute inset-y-0 left-0 bg-primary-600" style="width: {{ $adherencia }}%"></div>
                        </div>
                    </div>
                    <span class="{{ $valueBadge }}">{{ $adherencia }} %</span>
                </div>
            </div>
        </div>

        <div class="mx-5 mt-2 mb-5 flex items-start gap-3 rounded-default border border-rose-200 dark:border-rose-900/60 bg-rose-50 dark:bg-rose-900/20 px-4 py-3">
            <span class="w-9 h-9 rounded-full bg-rose-100 dark:bg-rose-900/40 text-rose-700 dark:text-rose-300 flex items-center justify-center shrink-0">
                <span class="icon-[lucide--alert-triangle] w-4 h-4"></span>
            </span>
            <div class="min-w-0">
                <p class="text-sm font-semibold text-rose-700 dark:text-rose-300">Recordatorio</p>
                <p class="text-xs text-body">El alcohol y el tabaco son perjudiciales para tu salud. Reduce o evita su consumo para mejorar tu bienestar.</p>
            </div>
        </div>
    </div>

    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--star] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <div>
                <h3 class="text-xl font-semibold text-strong">Recomendaciones</h3>
                <p class="text-xs text-muted">Recomendaciones personalizadas para mejorar tu salud.</p>
            </div>
        </div>

        <div class="divide-y divide-default">
            @foreach ($recomendaciones as $i => $recomendacion)
                <div class="flex items-start gap-3 px-5 py-3">
                    <span class="w-7 h-7 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center text-xs font-bold shrink-0">
                        {{ $i + 1 }}
                    </span>
                    <p class="text-sm text-body pt-1">{{ $recomendacion }}</p>
                </div>
            @endforeach
        </div>

        <div class="px-5 py-4 border-t border-default text-center">
            <p class="text-xs text-muted italic">Pequeños cambios generan grandes resultados.</p>
        </div>
    </div>
</div>
