@php
    $progresoCharts = [
        [
            'id' => 'tracking-weight-chart',
            'titulo' => 'Avance de peso',
            'unidad' => 'lbs',
            'inicial' => 187,
            'actual' => 172,
            'meta' => 159,
            'series' => [187, 185, 182, 179, 176, 174, 172],
            'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
            'goalDirection' => 'down',
        ],
        [
            'id' => 'tracking-fat-chart',
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
            'id' => 'tracking-muscle-chart',
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
    <x-slot name="header">Mi progreso</x-slot>

    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-strong">Mi progreso</h1>
            <p class="text-sm text-muted mt-1">
                Revisa tu evolución, mediciones y avances a lo largo del tiempo.
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
                    <div class="bg-surface @if ($chart['id'] === 'tracking-weight-chart') col-span-2 @endif">
                        <div class="flex items-start justify-between mb-4 gap-3">
                            <h3 class="text-lg font-semibold text-strong">{{ $chart['titulo'] }}</h3>
                        </div>
                        <div id="{{ $chart['id'] }}"></div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Mediciones --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="px-5 pt-5">
                <div class="flex items-center gap-2 mb-1">
                    <span class="icon-[lucide--ruler] w-5 h-5 text-primary-700 dark:text-primary-300"></span>
                    <p class="text-lg font-semibold text-strong">Mediciones</p>
                </div>
                {{-- <p class="text-xs text-muted">Última actualización: 20/07/2026</p> --}}
            </div>

            <div class="flex flex-wrap justify-center gap-4 p-5">
                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">162 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Talla</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">84 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cintura</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">102 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cadera</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">35 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Pantorrilla</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">54 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Muslo</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">28 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">C. Brazo</p>
                </div>
            </div>
        </div>

        {{-- Comparativa --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="px-5 pt-5">
                <div class="flex items-center gap-2 mb-1">
                    <p class="text-lg font-semibold text-strong">Historia</p>
                </div>
                <p class="text-xs text-muted flex items-center gap-1.5 mt-2">
                    <span class="icon-[lucide--lock] w-3.5 h-3.5"></span>
                    Las fotos que subas son privadas y solo tú podrás verlas.
                </p>
            </div>

            <div class="p-5">
                <label for="progress-photo-upload" class="flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-primary-900/10 px-4 py-6 cursor-pointer transition mb-4">
                    <span class="icon-[lucide--image-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
                    <div>
                        <p class="text-sm font-semibold text-strong">Subir foto de progreso</p>
                        <p class="text-xs text-muted">Formato JPG o PNG · arrastra el archivo o haz clic para seleccionarlo</p>
                    </div>
                    <input id="progress-photo-upload" type="file" accept="image/*" class="hidden">
                </label>

                <div class="flex flex-wrap gap-4">
                    <figure class="rounded-default border-card bg-surface overflow-hidden w-40">
                        <img src="{{ asset('images/persona-1.png') }}" alt="Foto de progreso inicial" class="w-full h-48 object-contain bg-white">
                        <figcaption class="px-3 py-2 border-t border-default">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <p class="text-xs font-semibold text-strong truncate">Foto inicial</p>
                                <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 px-2 py-0.5 text-2xs font-medium">Inicio</span>
                            </div>
                            <p class="text-xs text-muted flex items-center gap-1">
                                <span class="icon-[lucide--calendar] w-3 h-3"></span>
                                15/01/2026
                            </p>
                        </figcaption>
                    </figure>

                    <figure class="rounded-default border-card bg-surface overflow-hidden w-40">
                        <img src="{{ asset('images/persona-2.jpg') }}" alt="Foto de progreso actual" class="w-full h-48 object-contain bg-white">
                        <figcaption class="px-3 py-2 border-t border-default">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <p class="text-xs font-semibold text-strong truncate">Foto actual</p>
                                <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-2 py-0.5 text-2xs font-medium">Actual</span>
                            </div>
                            <p class="text-xs text-muted flex items-center gap-1">
                                <span class="icon-[lucide--calendar] w-3 h-3"></span>
                                20/07/2026
                            </p>
                        </figcaption>
                    </figure>
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
</x-app-layout>
