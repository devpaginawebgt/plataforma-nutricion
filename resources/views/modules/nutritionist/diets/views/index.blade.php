@php
    $dietas = [
        [
            'titulo' => 'Dieta base para mantenimiento',
            'descripcion' => 'Plan equilibrado para conservar peso y energía a lo largo del día.',
            'kcal' => 2000,
            'recetas' => [
                'Jocón de pollo con arroz integral',
                'Bowl de quinoa con vegetales',
                'Tortilla de espinaca al horno',
                'Salmón al horno con espárragos',
                'Ensalada mediterránea con pollo',
                'Wrap integral de atún y aguacate',
                'Curry de garbanzos con arroz',
                'Sopa de lentejas con verduras',
                'Frittata de vegetales al horno',
                'Pollo teriyaki con brócoli',
                'Tacos de pescado a la plancha',
            ],
        ],
        [
            'titulo' => 'Dieta baja en sodio',
            'descripcion' => 'Enfocada en reducir la retención de líquidos y cuidar la presión arterial.',
            'kcal' => 1800,
            'recetas' => [
                'Pescado al vapor con hierbas',
                'Chirmol de tomate con pollo asado',
                'Ensalada de garbanzos y aguacate',
                'Crema de calabaza sin sal',
                'Pollo al limón con romero',
                'Arroz salvaje con vegetales',
                'Ensalada de atún con manzana',
                'Sopa de verduras casera',
                'Tortitas de avena y plátano',
            ],
        ],
        [
            'titulo' => 'Plan de pérdida gradual',
            'descripcion' => 'Déficit calórico moderado con enfoque en saciedad y variedad de sabores.',
            'kcal' => 1500,
            'recetas' => [
                'Wrap integral de pollo y aguacate',
                'Tamalitos de chipilín al vapor',
                'Zoodles con pesto ligero',
                'Ensalada César con pollo asado',
                'Bowl de atún con edamame',
                'Berenjenas rellenas de quinoa',
                'Pollo a la mostaza con vegetales',
                'Sopa fría de pepino y yogur',
                'Salteado de tofu con brócoli',
                'Muffins de avena y arándano',
            ],
        ],
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

            <div class="flex gap-2">
                <x-button color="primary" icon="plus" size="sm" label="Nueva dieta" />
                <x-button
                    color="secondary"
                    icon="plus"
                    size="sm"
                    label="Nueva receta"
                    data-drawer-target="new-recipe-drawer"
                    data-drawer-show="new-recipe-drawer"
                    data-drawer-placement="right"
                    aria-controls="new-recipe-drawer"
                />
            </div>
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
                        placeholder="Buscar receta..."
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
                        <div class="flex items-start gap-3 min-w-0 flex-1">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                                <span class="icon-[lucide--clipboard-list] w-5 h-5"></span>
                            </div>
                            <div class="min-w-0">
                                <a href="{{ route('diets.show') }}" class="text-base font-bold text-strong leading-snug hover:text-primary-700 dark:hover:text-primary-300">
                                    {{ $dieta['titulo'] }}
                                </a>
                                <p class="text-xs text-muted mt-1 leading-relaxed">{{ $dieta['descripcion'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-1 shrink-0">
                            <x-button variant="ghost" color="primary" size="sm" icon="user-plus" iconOnly title="Asignar a paciente" />
                            <x-button variant="ghost" color="secondary" size="sm" icon="pencil" iconOnly title="Editar dieta" />
                            <x-button variant="ghost" color="danger" size="sm" icon="trash-2" iconOnly title="Eliminar dieta" />
                        </div>
                    </div>

                    {{-- Kcal --}}
                    <div class="mt-3 flex items-center gap-2">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 px-2.5 py-1 text-xs font-semibold">
                            <span class="icon-[lucide--flame] w-3.5 h-3.5"></span>
                            {{ number_format($dieta['kcal']) }} kcal/día
                        </span>
                    </div>

                    {{-- Recetas --}}
                    @php
                        $recetasVisibles = array_slice($dieta['recetas'], 0, 3);
                        $recetasExtra = count($dieta['recetas']) - count($recetasVisibles);
                    @endphp
                    <div class="mt-4">
                        <div class="flex items-center justify-between gap-2 mb-2">
                            <div class="flex items-center gap-2">
                                <span class="icon-[lucide--chef-hat] w-4 h-4 text-primary-600 dark:text-primary-400"></span>
                                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Recetas</p>
                            </div>
                            @if ($recetasExtra > 0)
                                <span class="inline-flex items-center rounded-full bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 px-2 py-0.5 text-2xs font-semibold">
                                    +{{ $recetasExtra }}
                                </span>
                            @endif
                        </div>
                        <ul class="space-y-1.5">
                            @foreach ($recetasVisibles as $receta)
                                <li class="flex items-start gap-2 text-xs text-body">
                                    <span class="icon-[lucide--utensils] w-3.5 h-3.5 mt-0.5 text-primary-600 dark:text-primary-400 shrink-0"></span>
                                    <span class="leading-relaxed">{{ $receta }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Footer --}}
                    {{-- <div class="mt-auto pt-4">
                        <div class="flex items-center justify-between border-t border-muted pt-4">
                            <a href="#" class="text-xs font-semibold text-primary-700 hover:underline dark:text-primary-300">Ver detalle</a>
                            <x-button variant="soft" color="warning" size="sm" icon="pencil" iconOnly title="Editar dieta" />
                        </div>
                    </div> --}}
                </article>
            @endforeach
        </div>
    </div>

    {{-- Drawer para crear nueva receta --}}
    <x-nutritionist-diets::new-recipe />
</x-app-layout>
