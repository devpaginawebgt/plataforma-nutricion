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
    'observaciones' => [
        [
            'autor' => 'María López Estrada',
            'fecha' => '28/08/2026',
            'texto' => 'Me siento con mucha más energía durante el día y he notado menos hinchazón abdominal. El plan me está siendo fácil de seguir y disfruto probar las nuevas recetas. ¡Gracias por el acompañamiento!',
        ],
    ],
    'progresoCharts' => [
        [
            'id' => 'follow-up-weight-chart',
            'titulo' => 'Avance de peso',
            'unidad' => 'lbs',
            'inicial' => 190,
            'actual' => 181,
            'meta' => 175,
            'series' => [190, 188, 186, 184, 183, 182, 181],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'down',
        ],
        [
            'id' => 'follow-up-fat-chart',
            'titulo' => 'Avance de grasa',
            'unidad' => '%',
            'inicial' => 30,
            'actual' => 26,
            'meta' => 22,
            'series' => [30, 29, 28, 27.5, 27, 26.5, 26],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'down',
        ],
        [
            'id' => 'follow-up-muscle-chart',
            'titulo' => 'Avance de músculo',
            'unidad' => '%',
            'inicial' => 22,
            'actual' => 24,
            'meta' => 28,
            'series' => [22, 22.5, 23, 23.5, 23.8, 24, 24],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'up',
        ],
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
        <div class="p-5 grid grid-cols-1 2xl:grid-cols-2 gap-5">
            @foreach ($progresoCharts as $chart)
                <div class="bg-surface @if ($chart['id'] === 'follow-up-weight-chart') col-span-2 @endif">
                    <div class="flex items-start justify-between mb-4 gap-3">
                        <h3 class="text-lg font-semibold text-strong">{{ $chart['titulo'] }}</h3>
                    </div>
                    <div id="{{ $chart['id'] }}"></div>
                </div>
            @endforeach
        </div>
    </div>

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
    </div>

    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--message-square-text] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <div>
                <h3 class="text-xl font-semibold text-strong">Observaciones</h3>
                <p class="text-xs text-muted">Comparte con tu nutrióloga cómo te sientes con el plan.</p>
            </div>
        </div>

        <div class="p-5 space-y-4">
            @foreach ($observaciones as $observacion)
                <div class="rounded-default border-card bg-primary-50/40 dark:bg-primary-900/10 p-4">
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <p class="text-sm font-semibold text-strong">{{ $observacion['autor'] }}</p>
                        <p class="text-xs text-muted flex items-center gap-1">
                            <span class="icon-[lucide--calendar] w-3.5 h-3.5"></span>
                            {{ $observacion['fecha'] }}
                        </p>
                    </div>
                    <p class="text-sm text-body leading-relaxed">{{ $observacion['texto'] }}</p>
                </div>
            @endforeach

            <div>
                <label for="nueva-observacion" class="block text-xs font-semibold uppercase tracking-wide text-muted mb-2">Nueva observación</label>
                <textarea id="nueva-observacion" rows="3" class="w-full rounded-default border-card bg-surface text-sm text-strong placeholder:text-muted focus:outline-none focus:border-primary-600 p-3" placeholder="Escribe una observación para tu nutrióloga..."></textarea>
                <div class="mt-3 flex justify-end">
                    <x-button variant="solid" color="success" size="sm" icon="send" label="Enviar observación" />
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof ApexCharts === 'undefined') return;

    const charts = @json($progresoCharts);

    charts.forEach((cfg) => {
        const el = document.querySelector('#' + cfg.id);
        if (!el) return;

        const values = [cfg.inicial, cfg.actual, cfg.meta];
        const min = Math.min(...values);
        const max = Math.max(...values);
        const pad = Math.max(1, (max - min) * 0.2);

        new ApexCharts(el, {
            chart: { type: 'area', height: 280, toolbar: { show: false }, foreColor: '#6b7280' },
            series: [{ name: cfg.titulo + ' (' + cfg.unidad + ')', data: cfg.series }],
            stroke: { curve: 'smooth', width: 2 },
            colors: ['#0d9488'],
            markers: { size: 5 },
            xaxis: { categories: cfg.categorias },
            yaxis: {
                min: Math.floor(min - pad),
                max: Math.ceil(max + pad),
                labels: { formatter: (v) => v.toFixed(1) + ' ' + cfg.unidad },
            },
            grid: { borderColor: 'rgba(107,114,128,0.15)' },
            tooltip: {
                theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                y: { formatter: (v) => v + ' ' + cfg.unidad },
            },
            annotations: {
                yaxis: [
                    { y: cfg.inicial, borderColor: '#9ca3af', strokeDashArray: 4,
                      label: { text: 'Inicial ' + cfg.inicial + ' ' + cfg.unidad, style: { color: '#fff', background: '#9ca3af' } } },
                    { y: cfg.actual, borderColor: '#0d9488', strokeDashArray: 4,
                      label: { text: 'Actual ' + cfg.actual + ' ' + cfg.unidad, style: { color: '#fff', background: '#0d9488' } } },
                    { y: cfg.meta, borderColor: '#22c55e', strokeDashArray: 4,
                      label: { text: 'Meta ' + cfg.meta + ' ' + cfg.unidad, style: { color: '#fff', background: '#22c55e' } } },
                ],
            },
        }).render();
    });
});
</script>
