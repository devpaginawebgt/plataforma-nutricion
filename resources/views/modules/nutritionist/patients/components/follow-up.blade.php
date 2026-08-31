@props([
    'habitos' => [
        'Reducir consumo de azúcar añadida',
        'Aumentar consumo de fibra y vegetales',
        'Dormir al menos 7 horas diarias',
    ],
    'observaciones' => 'La paciente muestra buena adherencia al plan. Refiere menor hinchazón abdominal y más energía durante el día. Se recomienda mantener el ritmo actual y reforzar la hidratación.',
    'metaLabel' => 'Tomar 8 vasos de agua al día',
    'metaCompletados' => 5,
    'metaTotal' => 8,
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

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">

    <div class="p-5 border-b border-default space-y-4 grid grid-cols-1 2xl:grid-cols-2">
        @foreach ($progresoCharts as $chart)
            <div class="bg-surface">
                <div class="flex items-start justify-between mb-4 gap-3">
                    <h3 class="text-lg font-semibold text-strong">{{ $chart['titulo'] }}</h3>
                </div>
                <div id="{{ $chart['id'] }}"></div>
            </div>
        @endforeach
    </div>

    <div class="p-5 border-b border-default">
        <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-3">Cambios de hábitos</p>
        <div class="space-y-2">
            @foreach ($habitos as $habito)
                <div class="flex items-center justify-between gap-3 rounded-default border-card px-4 py-3">
                    <span class="text-sm font-medium text-strong">{{ $habito }}</span>
                    <a href="#" class="inline-flex items-center gap-1 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-semibold shrink-0 hover:bg-primary-200 dark:hover:bg-primary-900/60 transition">
                        <span class="icon-[lucide--target] w-3.5 h-3.5"></span>
                        Meta
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="p-5 border-b border-default">
        <div class="flex items-center gap-2 mb-3">
            <span class="icon-[lucide--message-square-text] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Observaciones</p>
        </div>
        <p class="text-sm text-body leading-relaxed rounded-default bg-primary-50/40 dark:bg-primary-900/10 border-card p-4">
            {{ $observaciones }}
        </p>
    </div>

    <div class="p-5">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <span class="icon-[lucide--footprints] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Nuevas metas</p>
            </div>
            <span class="text-xs font-semibold text-strong">{{ $metaCompletados }} / {{ $metaTotal }} completados</span>
        </div>

        <div class="rounded-default border-card bg-primary-50/40 dark:bg-primary-900/10 p-5">
            <p class="text-sm font-semibold text-strong mb-4">{{ $metaLabel }}</p>

            <div class="flex items-center">
                @for ($i = 1; $i <= $metaTotal; $i++)
                    <div class="flex items-center {{ $i < $metaTotal ? 'flex-1' : '' }}">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center shrink-0 border-2 {{ $i <= $metaCompletados ? 'bg-primary-600 border-primary-600 text-white' : 'bg-surface border-default text-muted' }}">
                            @if ($i <= $metaCompletados)
                                <span class="icon-[lucide--check] w-4 h-4"></span>
                            @else
                                <span class="icon-[lucide--droplet] w-4 h-4"></span>
                            @endif
                        </div>

                        @if ($i < $metaTotal)
                            <div class="flex-1 h-0.5 mx-1 {{ $i < $metaCompletados ? 'bg-primary-600' : 'bg-default' }}"></div>
                        @endif
                    </div>
                @endfor

                <div class="w-11 h-11 rounded-full flex items-center justify-center shrink-0 ms-1 {{ $metaCompletados >= $metaTotal ? 'bg-primary-700 text-white' : 'bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300' }}">
                    <span class="icon-[lucide--flag] w-5 h-5"></span>
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
