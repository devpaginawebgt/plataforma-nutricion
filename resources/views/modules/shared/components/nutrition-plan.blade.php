@props(['showHeader' => true])

@php
    $palettes = [
        'teal'      => 'bg-primary-600',
        'teal-dark' => 'bg-primary-800',
        'emerald'   => 'bg-emerald-600',
        'cyan'      => 'bg-cyan-600',
    ];

    $items = [
        ['icon' => 'house',          'label' => 'Página de bienvenida',       'color' => 'teal',      'slug' => 'bienvenida'],
        ['icon' => 'user',           'label' => 'Datos antropométricos',      'color' => 'emerald',   'slug' => 'antropometrico'],
        ['icon' => 'target',         'label' => 'Diagnóstico y metas',        'color' => 'teal-dark', 'slug' => 'diagnosis'],
        ['icon' => 'chart-pie',      'label' => 'Porciones',                  'color' => 'cyan',      'slug' => 'portions'],
        ['icon' => 'utensils',       'label' => 'Menú nutricional',           'color' => 'emerald',   'slug' => 'menu'],
        ['icon' => 'list-checks',    'label' => 'Hábitos y recomendaciones',  'color' => 'cyan',      'slug' => 'habitos'],
        ['icon' => 'chef-hat',       'label' => 'Recetas',                    'color' => 'teal',      'slug' => 'recetas'],
        ['icon' => 'play',           'label' => 'Módulo de Transformación',   'color' => 'teal-dark', 'slug' => 'transformacion'],
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
                <a href="{{ route('patients.nutrition-plan') }}#{{ $item['slug'] }}"
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
                </a>
            @endforeach
        </div>
    </div>
</div>
