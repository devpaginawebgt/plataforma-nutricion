@php
    $temas = [
        'bienvenida'  => 'Bienvenida',
        'alimentacion'=> 'Alimentación',
        'sueno'       => 'Sueño',
        'salud'       => 'Salud',
        'motivacion'  => 'Motivación',
    ];

    $recursos = collect([
        ['tipo' => 'video', 'tema' => 'bienvenida',   'titulo' => '¡Bienvenido a tu plan nutricional!',        'descripcion' => 'Este es el inicio de tu transformación. Aquí encontrarás todo lo que necesitas para alcanzar tus metas con el acompañamiento de tu nutrióloga.', 'thumbnail' => 'images/transformation/bienvenida.jpg',     'duracion' => '5 minutos',  'paginas' => null],
        ['tipo' => 'video', 'tema' => 'alimentacion', 'titulo' => 'Construye tu rutina de comidas ideal',       'descripcion' => 'Guía práctica para organizar tus tiempos de comida, evitar largos ayunos involuntarios y mantener energía estable durante el día.',              'thumbnail' => 'images/transformation/rutina-comidas.jpg', 'duracion' => '22 minutos', 'paginas' => null],
        ['tipo' => 'pdf',   'tema' => 'alimentacion', 'titulo' => 'Recetario saludable para la semana',         'descripcion' => 'Recetas fáciles, balanceadas y deliciosas para preparar en casa. Incluye opciones para desayuno, almuerzo y cena con ingredientes accesibles.',      'thumbnail' => null,                                       'duracion' => null,         'paginas' => '18 páginas'],
        ['tipo' => 'pdf',   'tema' => 'sueno',        'titulo' => 'Guía para mejorar tu hábito de sueño',      'descripcion' => 'Rutinas de higiene del sueño, horarios recomendados y su impacto directo en el metabolismo y el control del peso corporal.',                    'thumbnail' => null,                                       'duracion' => null,         'paginas' => '12 páginas'],
        ['tipo' => 'video', 'tema' => 'salud',        'titulo' => 'Cómo romper el ciclo de comer por ansiedad','descripcion' => 'Aprende a identificar el hambre emocional y a sustituir los atracones por hábitos que calmen la ansiedad sin recurrir a la comida.',           'thumbnail' => 'images/transformation/ansiedad.jpg',       'duracion' => '18 minutos', 'paginas' => null],
    ])->groupBy('tema');
@endphp

<x-app-layout>
    <x-slot name="header">Transformación / Listado</x-slot>

    {{-- Encabezado --}}
    <div class="flex flex-col items-center gap-3 mb-6 sm:flex-row sm:items-end sm:justify-between sm:gap-4">
        <div class="text-center sm:text-left">
            <h1 class="text-xl font-bold text-strong sm:text-2xl">Módulo de Transformación</h1>
            <p class="text-sm text-muted mt-1">
                Videos y materiales que puedes asignar a tus pacientes como apoyo a su plan.
            </p>
        </div>

        <x-button
            color="primary"
            icon="plus"
            size="sm"
            label="Nuevo recurso"
            data-drawer-target="new-resource-drawer"
            data-drawer-show="new-resource-drawer"
            data-drawer-placement="right"
            aria-controls="new-resource-drawer"
        />
    </div>

    {{-- Filtros --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end mb-6">
        <div class="w-full sm:w-auto sm:flex-1 sm:max-w-sm">
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--search] w-4 h-4"></span>
                </div>
                <x-text-input id="transformation-search" type="search" placeholder="Buscar por título..." class="ps-10 text-sm bg-white dark:bg-gray-800" />
            </div>
        </div>

        <div class="w-full sm:w-auto sm:min-w-44">
            <x-select id="transformation-topic" class="text-sm">
                <option value="">Todos los temas</option>
                @foreach ($temas as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </x-select>
        </div>
    </div>

    {{-- Recursos agrupados por tema --}}
    <div class="space-y-8">
        @foreach ($temas as $slug => $label)
            @if ($recursos->has($slug))
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="text-sm font-semibold text-strong whitespace-nowrap">{{ $label }}</h2>
                        <div class="flex-1 border-t border-muted"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                        @foreach ($recursos[$slug] as $recurso)
                            <div class="bg-surface rounded-default shadow-card border-card overflow-hidden flex flex-col">
                                <div class="p-4 flex gap-3">
                                    {{-- Thumbnail: video con play / pdf con icono --}}
                                    @if ($recurso['tipo'] === 'pdf')
                                        <div class="w-32 h-24 rounded-default shrink-0 bg-red-50 dark:bg-red-900/30 flex flex-col items-center justify-center gap-1.5">
                                            <span class="icon-[lucide--file-text] w-8 h-8 text-red-500 dark:text-red-400"></span>
                                            <span class="text-2xs font-semibold uppercase tracking-wide text-red-500 dark:text-red-400">PDF</span>
                                        </div>
                                    @else
                                        <div class="relative w-32 h-24 rounded-default overflow-hidden shrink-0 bg-gray-200 dark:bg-gray-700">
                                            <img src="{{ asset($recurso['thumbnail']) }}"
                                                 alt="{{ $recurso['titulo'] }}"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.style.display='none'">
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <span class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center backdrop-blur-sm">
                                                    <span class="icon-[lucide--play] w-4 h-4 translate-x-px"></span>
                                                </span>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="flex-1 min-w-0">
                                        <div class="flex items-start justify-between gap-2">
                                            <p class="text-sm font-bold text-strong line-clamp-2 leading-snug">{{ $recurso['titulo'] }}</p>
                                            <div class="flex items-center gap-1 shrink-0 -mt-1 -mr-1">
                                                <x-button variant="ghost" color="primary" size="sm" icon="user-plus" iconOnly title="Asignar a paciente" />
                                                <x-button variant="ghost" color="secondary" size="sm" icon="pencil" iconOnly title="Editar recurso" />
                                                <x-button variant="ghost" color="danger" size="sm" icon="trash-2" iconOnly title="Eliminar recurso" />
                                            </div>
                                        </div>
                                        <p class="mt-1 text-xs text-body leading-snug line-clamp-2">{{ $recurso['descripcion'] }}</p>
                                    </div>
                                </div>

                                <div class="mt-auto grid grid-cols-2 border-t border-default">
                                    <div class="px-4 py-2 text-center">
                                        <p class="text-2xs font-semibold uppercase tracking-wide text-muted">
                                            {{ $recurso['tipo'] === 'pdf' ? 'Extensión' : 'Duración' }}
                                        </p>
                                        <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">
                                            {{ $recurso['tipo'] === 'pdf' ? $recurso['paginas'] : $recurso['duracion'] }}
                                        </p>
                                    </div>
                                    <div class="px-4 py-2 text-center border-l border-default">
                                        <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Tipo</p>
                                        <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight capitalize">
                                            {{ $recurso['tipo'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Drawer para crear nuevo recurso --}}
    <x-nutritionist-transformation::new-resource />
</x-app-layout>
