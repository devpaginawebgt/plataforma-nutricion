@php
    // Recomendaciones ficticias asignadas por la nutrióloga — solo lectura para el paciente.
    $recommendations = [
        [
            'id' => 1,
            'icon' => 'droplet',
            'title' => 'Hidratación diaria',
            'text' => 'Consume entre 2 y 2.5 litros de agua al día. Empieza el día con un vaso en ayunas y mantén una botella a la vista para recordar hidratarte constantemente.',
        ],
        [
            'id' => 2,
            'icon' => 'utensils',
            'title' => 'Control de porciones',
            'text' => 'Usa el método del plato: mitad de vegetales, un cuarto de proteína magra y un cuarto de carbohidratos complejos. Evita repetir porciones si aún no has esperado 15 minutos.',
        ],
        [
            'id' => 3,
            'icon' => 'candy-off',
            'title' => 'Reducción de azúcares',
            'text' => 'Limita el consumo de bebidas azucaradas y postres a máximo una vez por semana. Reemplaza con frutas frescas o yogur natural sin azúcar añadida.',
        ],
        [
            'id' => 5,
            'icon' => 'dumbbell',
            'title' => 'Actividad física regular',
            'text' => 'Realiza al menos 150 minutos semanales de actividad moderada (caminata rápida, natación, bicicleta). Complementa con 2 sesiones de fuerza.',
        ],
        [
            'id' => 9,
            'icon' => 'refrigerator',
            'title' => 'Preparación semanal',
            'text' => 'Dedica 2 horas del fin de semana para planificar y preparar tus comidas. Evita improvisar y reduces el consumo de ultra-procesados.',
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">Recomendaciones</x-slot>

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-xl font-bold text-strong sm:text-2xl">Recomendaciones</h1>
        <p class="text-sm text-muted mt-1">
            Sugerencias y consejos personalizados de tu nutricionista.
        </p>
    </div>

    {{-- Buscador --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end mb-6">
        <div class="w-full sm:w-auto sm:flex-1 sm:max-w-sm">
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--search] w-4 h-4"></span>
                </div>
                <x-text-input id="recommendations-search" type="search" placeholder="Buscar por título..." class="ps-10 text-sm bg-white dark:bg-gray-800" />
            </div>
        </div>
    </div>

    {{-- Grid de recomendaciones --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($recommendations as $rec)
            <article class="flex flex-col shadow-card border-card rounded-default bg-surface p-4 hover-lift">
                <div class="flex items-center gap-3 min-w-0">
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-default bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 shrink-0">
                        <span class="icon-[lucide--{{ $rec['icon'] }}] w-5 h-5"></span>
                    </span>
                    <h3 class="text-sm font-semibold text-strong leading-tight">{{ $rec['title'] }}</h3>
                </div>

                <p class="mt-3 text-sm text-muted leading-relaxed">
                    {{ $rec['text'] }}
                </p>
            </article>
        @endforeach
    </div>
</x-app-layout>
