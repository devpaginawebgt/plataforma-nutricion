@props(['showHeader' => true])

@php
    $palettes = [
        'teal'      => 'bg-primary-600',
        'teal-dark' => 'bg-primary-800',
        'emerald'   => 'bg-emerald-600',
        'cyan'      => 'bg-cyan-600',
    ];

    $items = [
        ['icon' => 'house',          'label' => 'Página de bienvenida',                                   'color' => 'teal'],
        ['icon' => 'user',           'label' => 'Datos antropométricos',                                  'color' => 'emerald'],
        ['icon' => 'clipboard-list', 'label' => 'Diagnóstico y hábitos, restricciones y recomendaciones', 'color' => 'teal-dark'],
        ['icon' => 'chart-pie',      'label' => 'Porciones',                                              'color' => 'cyan'],
        ['icon' => 'utensils',       'label' => 'Menú asignado',                                          'color' => 'emerald'],
        ['icon' => 'chef-hat',       'label' => 'Recetas',                                                'color' => 'teal'],
        ['icon' => 'dumbbell',       'label' => 'Ejercicio',                                              'color' => 'cyan'],
        ['icon' => 'play',           'label' => 'Módulo de transformación (videos y pdfs)',               'color' => 'teal-dark'],
    ];
@endphp

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    @if ($showHeader)
        <div class="flex items-center gap-3 px-5 py-4 border-b border-muted border-l border-l-primary-600 bg-primary-100/70 dark:bg-primary-900/40">
            <div class="w-9 h-9 rounded-full bg-primary-700 text-white flex items-center justify-center shrink-0 shadow-sm">
                <span class="icon-[lucide--salad] w-4 h-4"></span>
            </div>
            <h3 class="text-base font-bold text-strong">Plan nutricional</h3>
        </div>
    @endif

    <div class="p-5">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($items as $item)
                <button type="button"
                        class="group flex flex-col items-center gap-3 p-5 text-center rounded-2xl bg-surface
                               border border-gray-100 dark:border-slate-600
                               shadow-sm transition duration-200
                               hover:-translate-y-0.5
                               hover:border-gray-300 hover:shadow-md hover:shadow-gray-200
                               dark:hover:border-gray-600 dark:hover:shadow-md dark:hover:shadow-black/40">
                    <div class="w-16 h-16 flex items-center justify-center rounded-full text-white shadow-md
                                transition duration-200 group-hover:scale-[108%]
                                {{ $palettes[$item['color']] }}">
                        <span class="icon-[lucide--{{ $item['icon'] }}] w-7 h-7"></span>
                    </div>
                    <p class="text-sm font-semibold text-strong leading-snug">{{ $item['label'] }}</p>
                </button>
            @endforeach
        </div>
    </div>
</div>
