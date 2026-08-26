<div class="bg-surface rounded-default p-5 shadow-card border-card">
    <h3 class="text-lg font-semibold text-strong mb-4">Meta de Pacientes Activos</h3>
    <div id="dashboard-progress-chart"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('#dashboard-progress-chart');
    if (!el || typeof ApexCharts === 'undefined') return;
    new ApexCharts(el, {
        chart: { type: 'area', height: 280, toolbar: { show: false }, foreColor: '#6b7280' },
        series: [{ name: '% Avance', data: [2, 2, 1, 3, 5, 8, 8] }],
        stroke: { curve: 'smooth', width: 2},
        colors: ['#0d9488'],
        markers: { size: 5 },
        xaxis: { categories: ['Ene','Feb','Mar','Abr','May','Jun','Jul'] },
        yaxis: { min: 0, max: 10 },
        grid: { borderColor: 'rgba(107,114,128,0.15)' },
        tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' },
        annotations: {
            yaxis: [{
                y: 10,
                borderColor: '#3b82f6',
                strokeDashArray: 4,
                label: {
                    borderColor: '#3b82f6',
                    style: { color: '#fff', background: '#3b82f6', fontSize: '11px' },
                    text: 'Meta: 10',
                    position: 'left',
                    offsetX: 60,
                },
            }],
        },
    }).render();
});
</script>
