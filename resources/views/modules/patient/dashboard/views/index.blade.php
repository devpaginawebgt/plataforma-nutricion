@php
    $progresoCharts = [
        [
            'id' => 'dashboard-weight-chart',
            'titulo' => 'Avance de peso',
            'unidad' => 'lbs',
            'inicial' => 187,
            'actual' => 172,
            'meta' => 159,
            'series' => [187, 184, 181, 177, 174, 172, 170],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'down',
        ],
        [
            'id' => 'dashboard-fat-chart',
            'titulo' => 'Avance de grasa',
            'unidad' => '%',
            'inicial' => 28.5,
            'actual' => 24.2,
            'meta' => 20,
            'series' => [28.5, 27.8, 27.1, 26.3, 25.4, 24.8, 24.2],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'down',
        ],
        [
            'id' => 'dashboard-muscle-chart',
            'titulo' => 'Avance de músculo',
            'unidad' => '%',
            'inicial' => 34.1,
            'actual' => 36.8,
            'meta' => 40,
            'series' => [34.1, 34.6, 35.2, 35.7, 36.2, 36.5, 36.8],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'up',
        ],
    ];
@endphp

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

        {{-- Métricas inicial vs actual --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-patient-dashboard::weight-card
                label="Peso inicial"
                value="187"
                unit="lbs"
                date="15/01/2026"
                icon="scale"
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
                label="% Grasa inicial"
                value="28.5"
                unit="%"
                date="15/01/2026"
                icon="droplet"
                color="blue"
            />
            <x-patient-dashboard::weight-card
                label="% Grasa actual"
                value="24.2"
                unit="%"
                date="20/07/2026"
                icon="droplet"
                color="primary"
            />

            <x-patient-dashboard::weight-card
                label="% Muscular inicial"
                value="34.1"
                unit="%"
                date="15/01/2026"
                icon="dumbbell"
                color="blue"
            />
            <x-patient-dashboard::weight-card
                label="% Muscular actual"
                value="36.8"
                unit="%"
                date="20/07/2026"
                icon="dumbbell"
                color="primary"
            />
        </div>

        {{-- Gráficas de avance --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="p-5 grid grid-cols-1 2xl:grid-cols-2 gap-5">
                @foreach ($progresoCharts as $chart)
                    <div class="bg-surface @if ($chart['id'] === 'dashboard-weight-chart') col-span-2 @endif">
                        <div class="flex items-start justify-between mb-4 gap-3">
                            <h3 class="text-lg font-semibold text-strong">{{ $chart['titulo'] }}</h3>
                        </div>
                        <div id="{{ $chart['id'] }}"></div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Próxima cita --}}
        <x-patient-dashboard::next-appointment />
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
</x-app-layout>
