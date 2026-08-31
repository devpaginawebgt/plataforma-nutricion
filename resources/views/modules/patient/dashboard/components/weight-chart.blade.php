@props([
    'inicial' => 187,
    'actual' => 172,
    'meta' => 159,
    'series' => [187, 184, 181, 177, 174, 172, 170],
    'categorias' => ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul'],
])

<div class="bg-surface rounded-default p-5 shadow-card border-card">
    <div class="flex items-start justify-between mb-4 gap-3">
        <div>
            <h3 class="text-lg font-semibold text-strong">Avance de peso</h3>
        </div>        
    </div>

    <div id="patient-weight-chart"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('#patient-weight-chart');
    if (!el || typeof ApexCharts === 'undefined') return;

    const inicial = {{ $inicial }};
    const actual = {{ $actual }};
    const meta = {{ $meta }};

    new ApexCharts(el, {
        chart: { type: 'area', height: 280, toolbar: { show: false }, foreColor: '#6b7280' },
        series: [{ name: 'Peso (lbs)', data: @json($series) }],
        stroke: { curve: 'smooth', width: 2 },
        colors: ['#0d9488'],
        markers: { size: 5 },
        xaxis: { categories: @json($categorias) },
        yaxis: {
            min: Math.floor(meta - 3),
            max: Math.ceil(inicial + 3),
            labels: { formatter: v => v.toFixed(1) + ' lbs' },
        },
        grid: { borderColor: 'rgba(107,114,128,0.15)' },
        tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
        annotations: {
            yaxis: [
                { y: inicial, borderColor: '#9ca3af', strokeDashArray: 4,
                  label: { text: 'Inicial ' + inicial + ' lbs', style: { color: '#fff', background: '#9ca3af' } } },
                { y: actual, borderColor: '#0d9488', strokeDashArray: 4,
                  label: { text: 'Actual ' + actual + ' lbs', style: { color: '#fff', background: '#0d9488' } } },
                { y: meta, borderColor: '#22c55e', strokeDashArray: 4,
                  label: { text: 'Meta ' + meta + ' lbs', style: { color: '#fff', background: '#22c55e' } } },
            ],
        },
    }).render();
});
</script>
