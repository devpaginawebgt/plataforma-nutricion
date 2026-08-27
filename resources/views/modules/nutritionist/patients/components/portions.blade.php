@props([
    'kcal' => '1,400',
    'plateImage' => 'images/plato.png',
    'nutrients' => [
        'proteins'   => ['label' => 'Proteínas',     'portions' => 8, 'icon' => 'lucide--beef',     'bg' => 'bg-primary-100 dark:bg-primary-900/40',    'text' => 'text-primary-700 dark:text-primary-200', 'ring' => 'ring-primary-300 dark:ring-primary-700'],
        'vegetables' => ['label' => 'Vegetales',     'portions' => 5, 'icon' => 'lucide--leaf',     'bg' => 'bg-green-100 dark:bg-green-900/40',        'text' => 'text-green-800 dark:text-green-200',     'ring' => 'ring-green-300 dark:ring-green-700'],
        'fruits'     => ['label' => 'Frutas',        'portions' => 2, 'icon' => 'lucide--apple',    'bg' => 'bg-rose-100 dark:bg-rose-900/40',          'text' => 'text-rose-800 dark:text-rose-200',       'ring' => 'ring-rose-300 dark:ring-rose-700'],
        'carbs'      => ['label' => 'Carbohidratos', 'portions' => 6, 'icon' => 'lucide--wheat',    'bg' => 'bg-amber-100 dark:bg-amber-900/40',        'text' => 'text-amber-800 dark:text-amber-200',     'ring' => 'ring-amber-300 dark:ring-amber-700'],
        'fats'       => ['label' => 'Grasas',        'portions' => 4, 'icon' => 'lucide--droplet',  'bg' => 'bg-orange-100 dark:bg-orange-900/40',      'text' => 'text-orange-800 dark:text-orange-200',   'ring' => 'ring-orange-300 dark:ring-orange-700'],
        'milk'       => ['label' => 'Leche',         'portions' => 1, 'icon' => 'lucide--milk',     'bg' => 'bg-cyan-100 dark:bg-cyan-900/40',          'text' => 'text-cyan-800 dark:text-cyan-200',       'ring' => 'ring-cyan-300 dark:ring-cyan-700'],
    ],
    'dailyDistribution' => [
        ['label' => 'Desayuno', 'icon' => 'lucide--sunrise',  'items' => ['Proteína', 'Carbohidrato', 'Fruta']],
        ['label' => 'Almuerzo', 'icon' => 'lucide--sun',      'items' => ['Proteína', 'Carbohidrato', 'Vegetales']],
        ['label' => 'Cena',     'icon' => 'lucide--moon',     'items' => ['Proteína', 'Vegetales', 'Grasa saludable']],
        ['label' => 'Snack',    'icon' => 'lucide--apple',    'items' => ['Fruta', 'Yogurt deslactosado']],
    ],
])

@php
    $circle = function ($n) {
        return <<<HTML
            <div class="w-24 h-24 rounded-full {$n['bg']} {$n['text']} ring-2 {$n['ring']} shadow-sm flex flex-col items-center justify-center text-center px-2">
                <span class="icon-[{$n['icon']}] w-4 h-4 mb-0.5"></span>
                <span class="text-2xs font-bold uppercase tracking-wide leading-tight">{$n['label']}</span>
                <span class="text-xl font-extrabold leading-none">{$n['portions']}</span>
                <span class="text-[9px] uppercase tracking-wide">porciones</span>
            </div>
        HTML;
    };
@endphp

<div class="space-y-4">
    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="relative px-5 py-6 text-center">
            <h2 class="text-3xl font-extrabold text-strong">Tu Plato</h2>
            <p class="mt-2 mx-auto max-w-xl text-sm text-muted">
                Aprende a distribuir tus porciones diarias para alcanzar tus objetivos de bienestar y transformación.
            </p>

            <div class="mt-4 md:mt-0 md:absolute md:top-5 md:right-5 inline-flex flex-col items-center justify-center w-20 h-20 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-800 dark:text-primary-200 ring-2 ring-primary-300 dark:ring-primary-700 shadow-sm">
                <span class="icon-[lucide--salad] w-4 h-4 mb-0.5"></span>
                <span class="text-lg font-extrabold leading-none">{{ $kcal }}</span>
                <span class="text-[9px] font-semibold uppercase tracking-wide mt-0.5">kcal/día</span>
            </div>
        </div>

        <div class="px-5 pb-8 md:pt-12 md:pb-20">
            <div class="hidden md:block relative w-full max-w-xl mx-auto aspect-square">
                <img src="{{ asset($plateImage) }}" alt="Plato saludable"
                     class="absolute inset-[12%] w-[76%] h-[76%] rounded-full object-cover shadow-md">

                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    {!! $circle($nutrients['proteins']) !!}
                </div>
                <div class="absolute top-[15%] right-0 -translate-y-1/2 translate-x-1/4">
                    {!! $circle($nutrients['carbs']) !!}
                </div>
                <div class="absolute bottom-[15%] right-0 translate-y-1/2 translate-x-1/4">
                    {!! $circle($nutrients['fats']) !!}
                </div>
                <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-1/2">
                    {!! $circle($nutrients['milk']) !!}
                </div>
                <div class="absolute bottom-[15%] left-0 translate-y-1/2 -translate-x-1/4">
                    {!! $circle($nutrients['fruits']) !!}
                </div>
                <div class="absolute top-[15%] left-0 -translate-y-1/2 -translate-x-1/4">
                    {!! $circle($nutrients['vegetables']) !!}
                </div>
            </div>

            <div class="md:hidden flex flex-col items-center gap-4">
                <img src="{{ asset($plateImage) }}" alt="Plato saludable" class="w-full max-w-xs rounded-full shadow-md">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 justify-items-center">
                    @foreach ($nutrients as $n)
                        <div>{!! $circle($n) !!}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-primary-50 dark:bg-primary-900/20 rounded-default shadow-card border border-primary-200 dark:border-primary-800 overflow-hidden">
        <div class="p-5 flex items-start gap-3">
            <span class="w-10 h-10 rounded-full bg-primary-700 text-white flex items-center justify-center shrink-0 shadow-sm mt-2">
                <span class="icon-[lucide--lightbulb] w-5 h-5"></span>
            </span>
            <div>
                <p class="text-sm font-bold uppercase tracking-wide text-primary-800 dark:text-primary-200">Consejo</p>
                <p class="mt-1 text-sm text-body leading-relaxed">
                    Procura que la mitad de tu plato siempre esté compuesta por vegetales. Esto favorece la saciedad,
                    aporta fibra y mejora la calidad nutricional de tu alimentación.
                </p>
            </div>
        </div>
    </div>

    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--calendar-days] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <div>
                <h3 class="text-xl font-semibold text-strong">Distribución diaria sugerida</h3>
                <p class="text-xs text-muted">Cómo repartir las porciones entre las comidas del día.</p>
            </div>
        </div>

        <div class="p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($dailyDistribution as $meal)
                <div class="rounded-default border-card bg-surface p-4 text-center">
                    <div class="w-12 h-12 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[{{ $meal['icon'] }}] w-6 h-6"></span>
                    </div>
                    <p class="text-sm font-bold uppercase tracking-wide text-strong">{{ $meal['label'] }}</p>
                    <ul class="mt-2 space-y-1">
                        @foreach ($meal['items'] as $item)
                            <li class="text-xs text-body">{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
