<div class="bg-white dark:bg-gray-800 rounded-default p-5 shadow-sm border border-gray-100 dark:border-gray-700">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Gráfica general de avances</h3>
    <div id="dashboard-progress-chart"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('#dashboard-progress-chart');
    if (!el || typeof ApexCharts === 'undefined') return;
    new ApexCharts(el, {
        chart: { type: 'area', height: 280, toolbar: { show: false }, foreColor: '#6b7280' },
        series: [{ name: '% Avance', data: [25, 40, 55, 60, 68, 72, 78] }],
        stroke: { curve: 'smooth', width: 2},
        colors: ['#0d9488'],
        markers: { size: 5 },
        xaxis: { categories: ['Ene','Feb','Mar','Abr','May','Jun','Jul'] },
        yaxis: { min: 0, max: 100 },
        grid: { borderColor: 'rgba(107,114,128,0.15)' },
        tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
    }).render();
});
</script>
