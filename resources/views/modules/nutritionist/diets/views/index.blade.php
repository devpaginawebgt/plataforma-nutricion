@php
    $dietas = [
        [
            'titulo' => 'Dieta base para mantenimiento',
            'paciente' => 'Ana Morales',
            'estado' => 'Activa',
            'antropometricos' => [
                ['label' => 'Peso', 'value' => '68 kg'],
                ['label' => 'IMC', 'value' => '24.1'],
                ['label' => '% grasa', 'value' => '27%'],
            ],
            'habitos' => ['Beber 2 L de agua', 'Caminar 30 min diarios'],
            'menu' => ['Avena con frutas', 'Pollo con quinoa', 'Ensalada mediterránea'],
            'recetas' => ['Jocón de pollo con arroz integral', 'Bowl de quinoa con vegetales', 'Tortilla de espinaca al horno'],
            'ejercicios' => ['Sentadillas 3×12', 'Plancha 45 s'],
        ],
        [
            'titulo' => 'Dieta baja en sodio',
            'paciente' => 'Carlos Mendoza',
            'estado' => 'Activa',
            'antropometricos' => [
                ['label' => 'Peso', 'value' => '82 kg'],
                ['label' => 'IMC', 'value' => '28.4'],
                ['label' => 'P/A', 'value' => '138/88'],
            ],
            'habitos' => ['Evitar embutidos', 'Reducir sal añadida'],
            'menu' => ['Tostadas integrales', 'Pescado al vapor', 'Sopa de verduras'],
            'recetas' => ['Pescado al vapor con hierbas', 'Chirmol de tomate con pollo asado', 'Ensalada de garbanzos y aguacate'],
            'ejercicios' => ['Bicicleta 20 min', 'Estiramientos 10 min'],
        ],
        [
            'titulo' => 'Plan de pérdida gradual',
            'paciente' => 'Patricia Flores',
            'estado' => 'Desactivada',
            'antropometricos' => [
                ['label' => 'Peso', 'value' => '76 kg'],
                ['label' => 'IMC', 'value' => '29.7'],
                ['label' => '% grasa', 'value' => '34%'],
            ],
            'habitos' => ['Cena antes de las 8 pm', 'Sin bebidas azucaradas'],
            'menu' => ['Yogur con nueces', 'Pechuga a la plancha', 'Crema de calabaza'],
            'recetas' => ['Wrap integral de pollo y aguacate', 'Tamalitos de chipilín al vapor', 'Zoodles con pesto ligero'],
            'ejercicios' => ['Caminata 40 min', 'Peso muerto 3×10'],
        ],
    ];

    $estadoColors = [
        'Activa' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300',
        'En revisión' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300',
        'Desactivada' => 'bg-red-50 text-red-700 dark:bg-red-900/40 dark:text-red-300',
    ];

    $secciones = [
        ['icon' => 'heart-pulse', 'label' => 'Hábitos',    'key' => 'habitos'],
        ['icon' => 'utensils',    'label' => 'Menú',       'key' => 'menu'],
        ['icon' => 'chef-hat',    'label' => 'Recetas',    'key' => 'recetas'],
        ['icon' => 'dumbbell',    'label' => 'Ejercicios', 'key' => 'ejercicios'],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">Planes Nutricionales</x-slot>

    <div class="space-y-6">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-strong">Dietas y planes</h1>
                <p class="text-sm text-muted mt-1">
                    Administra los planes nutricionales para asignar a tus pacientes.
                </p>
            </div>

            <x-button color="primary" icon="plus" size="sm" label="Nuevo plan" />
        </div>

        {{-- Filtro --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end">
            <div class="w-full sm:w-72">
                <x-input-label for="diets-search" value="Buscar" class="text-xs" />
                <div class="relative mt-1">
                    <span class="icon-[lucide--search] w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                    <x-text-input
                        id="diets-search"
                        type="search"
                        placeholder="Título o paciente..."
                        class="block w-full pl-9 text-sm bg-white dark:bg-gray-800"
                    />
                </div>
            </div>

            {{-- <div class="w-full sm:w-auto">
                <x-input-label for="diets-state-filter" value="Estado" class="text-xs" />
                <x-select id="diets-state-filter" class="mt-1 min-w-36 bg-white dark:bg-gray-800">
                    <option value="active">Activas</option>
                    <option value="inactive">Desactivadas</option>
                </x-select>
            </div> --}}

            <x-button color="primary" icon="filter" iconOnly title="Filtrar" class="mb-1" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($dietas as $dieta)
                <article class="flex flex-col bg-surface border-card rounded-card shadow-card p-5 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
                    {{-- Encabezado --}}
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                                <span class="icon-[lucide--clipboard-list] w-5 h-5"></span>
                            </div>
                            <div class="min-w-0">
                                <h2 class="text-base font-bold text-strong leading-snug truncate">{{ $dieta['titulo'] }}</h2>
                                <p class="text-xs text-muted mt-0.5">{{ $dieta['paciente'] }}</p>
                            </div>
                        </div>

                        <span class="inline-flex shrink-0 items-center justify-center rounded-full px-2.5 py-1 text-[11px] font-semibold {{ $estadoColors[$dieta['estado']] ?? $estadoColors['Activa'] }}">
                            {{ $dieta['estado'] }}
                        </span>
                    </div>

                    {{-- Antropométricos --}}
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        @foreach ($dieta['antropometricos'] as $item)
                            <div class="rounded-default bg-primary-50/70 dark:bg-primary-900/20 px-2 py-1.5 text-center">
                                <p class="text-[11px] font-medium text-muted uppercase tracking-wide">{{ $item['label'] }}</p>
                                <p class="text-sm font-semibold text-strong">{{ $item['value'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{-- Secciones del plan --}}
                    <dl class="mt-4 space-y-3">
                        @foreach ($secciones as $seccion)
                            @php
                                $items = $dieta[$seccion['key']];
                                $visible = array_slice($items, 0, 2);
                                $extra = count($items) - count($visible);
                            @endphp
                            <div class="flex items-start gap-2.5">
                                <span class="icon-[lucide--{{ $seccion['icon'] }}] w-4 h-4 mt-0.5 text-primary-600 dark:text-primary-400 shrink-0"></span>
                                <div class="min-w-0">
                                    <dt class="text-[11px] font-semibold uppercase tracking-wide text-muted">{{ $seccion['label'] }}</dt>
                                    <dd class="text-xs text-muted mt-0.5 leading-relaxed">
                                        {{ implode(' · ', $visible) }}
                                        @if ($extra > 0)
                                            <span class="ml-1 inline-flex items-center rounded-full bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 px-1.5 py-0.5 text-2xs font-semibold align-middle">
                                                +{{ $extra }}
                                            </span>
                                        @endif
                                    </dd>
                                </div>
                            </div>
                        @endforeach
                    </dl>

                    {{-- Footer --}}
                    <div class="mt-auto pt-4">
                        <div class="flex items-center justify-between border-t border-muted pt-4">
                            <a href="#" class="text-xs font-semibold text-primary-700 hover:underline dark:text-primary-300">Ver detalle</a>
                            <x-button variant="soft" color="warning" size="sm" icon="pencil" iconOnly title="Editar dieta" />
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
