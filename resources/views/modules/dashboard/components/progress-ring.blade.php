@props(['value' => 72, 'label' => 'Promedio de avance general'])

<div class="bg-white dark:bg-gray-800 rounded-default p-5 shadow-sm border border-gray-100 dark:border-gray-700 flex flex-col justify-center items-center">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 text-center">{{ $label }}</h3>
    <div id="dashboard-progress-ring" data-value="{{ $value }}"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('#dashboard-progress-ring');
    if (!el || typeof ApexCharts === 'undefined') return;
    const value = parseInt(el.dataset.value, 10);
    new ApexCharts(el, {
        chart: { type: 'radialBar', height: 280 },
        series: [value],
        colors: ['#0d9488'],
        plotOptions: {
            radialBar: {
                hollow: { size: '65%' },
                dataLabels: {
                    name: { show: false },
                    value: {
                        fontSize: '32px',
                        fontWeight: 700,
                        color: document.documentElement.classList.contains('dark') ? '#f3f4f6' : '#111827',
                        formatter: (v) => v + '%',
                    },
                },
            },
        },
        stroke: { lineCap: 'round' },
    }).render();
});
</script>
