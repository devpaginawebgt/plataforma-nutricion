@props([
    'diagnosticoPes' => 'Ingesta energética excesiva relacionada con patrones alimentarios inadecuados y bajo nivel de actividad física, evidenciado por aumento de peso (IMC 26.2 kg/m²), circunferencia de cintura de 84 cm y consumo frecuente de alimentos ultraprocesados.',
    'metaGeneral' => 'Reducir el porcentaje de grasa corporal y mejorar los hábitos alimentarios a través de un plan estructurado basado en el sistema de intercambios, promoviendo cambios sostenibles en el estilo de vida.',
    'metasEspecificas' => [
        'Perder 4 kg de masa grasa en 12 semanas',
        'Consumir 5 porciones de vegetales al día',
        'Reducir el consumo de bebidas azucaradas a máximo 1 vez por semana',
        'Realizar actividad física al menos 4 veces por semana',
    ],
    'metasCuantitativas' => [
        [
            'label' => 'Meta de peso',
            'value' => '175',
            'unit' => 'lbs',
            'date' => '31/12/2026',
            'icon' => 'target',
        ],
        [
            'label' => 'Meta de grasa',
            'value' => '22',
            'unit' => '%',
            'date' => '31/12/2026',
            'icon' => 'droplet',
        ],
        [
            'label' => 'Meta de músculo',
            'value' => '28',
            'unit' => '%',
            'date' => '31/12/2026',
            'icon' => 'dumbbell',
        ],
    ],
])

<div class="space-y-4">
    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--clipboard-list] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <h3 class="text-xl font-semibold text-strong">Diagnóstico PES de Nutrición y Metas</h3>
        </div>

        <div class="p-5 space-y-4">
            <div class="rounded-default border-card bg-surface p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--clipboard-list] w-4 h-4"></span>
                    </span>
                    <p class="text-sm font-semibold text-strong">Diagnóstico PES de Nutrición</p>
                </div>

                <p class="text-sm text-body leading-relaxed">{{ $diagnosticoPes }}</p>
            </div>

            <div class="rounded-default border-card bg-surface p-4">
                <div class="flex items-center gap-2 mb-4">
                    <span class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center shrink-0">
                        <span class="icon-[lucide--target] w-4 h-4"></span>
                    </span>
                    <p class="text-sm font-semibold text-strong">Metas del Plan</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="icon-[lucide--star] w-4 h-4 text-primary-700 dark:text-primary-300 mt-0.5"></span>
                            <p class="text-sm font-semibold text-strong">Meta General</p>
                        </div>
                        <p class="text-sm text-body leading-relaxed">{{ $metaGeneral }}</p>
                    </div>

                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <span class="icon-[lucide--list-checks] w-4 h-4 text-primary-700 dark:text-primary-300 mt-0.5"></span>
                            <p class="text-sm font-semibold text-strong">Metas Específicas</p>
                        </div>

                        <ol class="space-y-2 list-decimal list-inside marker:text-primary-700 dark:marker:text-primary-300 marker:font-semibold">
                            @foreach ($metasEspecificas as $meta)
                                <li class="text-sm text-strong leading-relaxed rounded-default bg-primary-100/30 dark:bg-primary-900/20 border border-primary-200 dark:border-primary-800 px-3 py-2">{{ $meta }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($metasCuantitativas as $meta)
            <div class="bg-surface rounded-default p-5 shadow-card border-card flex items-center gap-4">
                <div class="w-12 h-12 rounded-default flex items-center justify-center shrink-0 bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                    <span class="icon-[lucide--{{ $meta['icon'] }}] w-6 h-6"></span>
                </div>
                <div class="min-w-0">
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">{{ $meta['label'] }}</p>
                    <p class="text-2xl font-bold text-strong leading-tight">
                        {{ $meta['value'] }} <span class="text-sm font-medium text-muted">{{ $meta['unit'] }}</span>
                    </p>
                    @if (!empty($meta['date']))
                        <p class="text-xs text-muted mt-0.5 flex items-center gap-1">
                            <span class="icon-[lucide--calendar] w-3.5 h-3.5"></span>
                            {{ $meta['date'] }}
                        </p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
