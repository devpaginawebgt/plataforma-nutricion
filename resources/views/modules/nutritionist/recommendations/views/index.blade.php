@php
    // Recomendaciones ficticias — listado que la nutrióloga podrá reutilizar y asignar a cada paciente.
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
            'id' => 4,
            'icon' => 'wheat',
            'title' => 'Aumento de fibra',
            'text' => 'Incluye al menos 25g de fibra al día. Prioriza avena, legumbres, frutas con cáscara y vegetales verdes en cada comida principal.',
        ],
        [
            'id' => 5,
            'icon' => 'dumbbell',
            'title' => 'Actividad física regular',
            'text' => 'Realiza al menos 150 minutos semanales de actividad moderada (caminata rápida, natación, bicicleta). Complementa con 2 sesiones de fuerza.',
        ],
        [
            'id' => 6,
            'icon' => 'moon',
            'title' => 'Descanso reparador',
            'text' => 'Duerme entre 7 y 8 horas diarias. Evita pantallas y comidas pesadas 2 horas antes de dormir para mejorar la calidad del sueño.',
        ],
        [
            'id' => 7,
            'icon' => 'heart-pulse',
            'title' => 'Manejo del estrés',
            'text' => 'Practica 10 minutos diarios de respiración consciente o meditación. El estrés crónico incrementa el cortisol y favorece el aumento de peso abdominal.',
        ],
        [
            'id' => 8,
            'icon' => 'salad',
            'title' => 'Alimentación consciente',
            'text' => 'Come sin distracciones (sin TV ni celular). Mastica lentamente cada bocado (20-30 veces) para mejorar la digestión y la saciedad.',
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
    <x-slot name="header">Recomendaciones / Listado</x-slot>

    {{-- Encabezado --}}
    <div class="flex flex-col items-center gap-3 mb-6 sm:flex-row sm:items-end sm:justify-between sm:gap-4">
        <div class="text-center sm:text-left">
            <h1 class="text-xl font-bold text-strong sm:text-2xl">Recomendaciones</h1>
            <p class="text-sm text-muted mt-1">
                Listado de recomendaciones preexistentes que puedes asignar a cada paciente.
            </p>
        </div>

        <x-button
            color="primary"
            icon="plus"
            size="sm"
            label="Nueva recomendación"
            data-drawer-target="new-recommendation-drawer"
            data-drawer-show="new-recommendation-drawer"
            data-drawer-placement="right"
            aria-controls="new-recommendation-drawer"
        />
    </div>

    {{-- Filtros --}}
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
            <article class="flex flex-col shadow-card border-card rounded-default bg-surface p-4">
                {{-- Header: icono + título + acciones --}}
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-default bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 shrink-0">
                            <span class="icon-[lucide--{{ $rec['icon'] }}] w-5 h-5"></span>
                        </span>
                        <h3 class="text-sm font-semibold text-strong leading-tight">{{ $rec['title'] }}</h3>
                    </div>

                    <div class="flex items-center gap-1 shrink-0">
                        <x-button variant="ghost" color="warning" size="sm" icon="pencil" iconOnly title="Editar recomendación" />
                        <x-button variant="ghost" color="danger" size="sm" icon="trash-2" iconOnly title="Eliminar recomendación" />
                    </div>
                </div>

                {{-- Texto --}}
                <p class="mt-3 text-sm text-muted leading-relaxed">
                    {{ $rec['text'] }}
                </p>

                {{-- Footer: acción de asignar --}}
                {{-- <div class="mt-4 pt-3 border-t border-muted flex justify-end">
                    <x-button variant="soft" color="primary" size="sm" icon="plus" label="Asignar a paciente" />
                </div> --}}
            </article>
        @endforeach
    </div>

    {{-- Drawer para crear nueva recomendación --}}
    <x-nutritionist-recommendations::new-recommendation />
</x-app-layout>
