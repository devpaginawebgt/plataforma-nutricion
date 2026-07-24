@props([
    'inicial' => 187,
    'actual' => 172,
    'meta' => 159,
])

@php
    $deltaTotal = $meta - $inicial;
    $progreso = $actual - $inicial;

    $porcentaje = $deltaTotal == 0
        ? 100
        : max(0, min(100, round(($progreso / $deltaTotal) * 100)));

    $restante = round(abs($actual - $meta), 1);
    $signo = $deltaTotal < 0 ? '-' : '+';
    $totalPeso = abs($deltaTotal);

    if ($porcentaje >= 100) {
        $mensaje = '¡Meta alcanzada! 🎉';
    } elseif ($porcentaje >= 75) {
        $mensaje = 'Ya casi lo logras 🔥';
    } elseif ($porcentaje >= 40) {
        $mensaje = 'Vamos por buen camino 💪';
    } elseif ($porcentaje > 0) {
        $mensaje = 'Buen inicio, sigue así 🌱';
    } else {
        $mensaje = 'Empecemos el camino 🚀';
    }
@endphp

<div class="bg-surface rounded-default p-5 shadow-card border-card flex flex-col items-center justify-center">
    <p class="text-md font-bold text-strong">Meta: {{ $signo }}{{ $totalPeso }} lbs</p>

    <div id="patient-weight-goal-progress"
         data-value="{{ $porcentaje }}"
         class="-mb-12">
    </div>

    <div class="text-center">
        <p class="text-sm text-body font-medium">{{ $mensaje }}</p>
        <p class="text-xs text-muted mt-1">
            @if ($porcentaje >= 100)
                Has llegado a tu meta de {{ $meta }} lbs
            @else
                Te faltan {{ $restante }} lbs para tu meta
            @endif
        </p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const el = document.querySelector('#patient-weight-goal-progress');
    if (!el || typeof ApexCharts === 'undefined') return;
    const value = parseInt(el.dataset.value, 10);

    new ApexCharts(el, {
        chart: { type: 'radialBar', height: 260, sparkline: { enabled: true } },
        series: [value],
        colors: ['#0d9488'],
        plotOptions: {
            radialBar: {
                startAngle: -110,
                endAngle: 110,
                hollow: { size: '62%' },
                track: { baclbsround: '#e5e7eb', strokeWidth: '100%' },
                dataLabels: {
                    name: { show: false },
                    value: {
                        offsetY: 6,
                        fontSize: '28px',
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
