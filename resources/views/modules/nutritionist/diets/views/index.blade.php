@php
    $dietas = [
        [
            'titulo' => 'Dieta base para mantenimiento',
            'paciente' => 'Ana Morales',
            'objetivo' => 'Equilibrio energético',
            'duracion' => '4 semanas',
            'kcal' => '2,100 kcal',
            'descripcion' => 'Plan con 3 comidas principales, 2 colaciones ligeras y suficiente hidratación diaria.',
            'estado' => 'Activa',
        ],
        [
            'titulo' => 'Dieta baja en sodio',
            'paciente' => 'Carlos Mendoza',
            'objetivo' => 'Control de presión arterial',
            'duracion' => '6 semanas',
            'kcal' => '1,800 kcal',
            'descripcion' => 'Menú enfocada en alimentos frescos, sin procesados y con moderación de sal.',
            'estado' => 'Activa',
        ],
        [
            'titulo' => 'Plan de pérdida gradual',
            'paciente' => 'Patricia Flores',
            'objetivo' => 'Reducción de grasa corporal',
            'duracion' => '8 semanas',
            'kcal' => '1,650 kcal',
            'descripcion' => 'Estructura con proteínas adecuadas, control de porciones y opción de recetas sencillas.',
            'estado' => 'Desactivada',
        ],
        [
            'titulo' => 'Dieta para mejorar digestión',
            'paciente' => 'José Castillo',
            'objetivo' => 'Reducir molestias digestivas',
            'duracion' => '3 semanas',
            'kcal' => '1,950 kcal',
            'descripcion' => 'Incluye fibra gradual, menor consumo de irritantes y comidas suaves y bien distribuidas.',
            'estado' => 'Activa',
        ],
        [
            'titulo' => 'Dieta de volumen y rendimiento',
            'paciente' => 'Miguel Herrera',
            'objetivo' => 'Aumento de masa muscular',
            'duracion' => '5 semanas',
            'kcal' => '2,500 kcal',
            'descripcion' => 'Mayor aporte proteico con horarios de comida pre y post entrenamiento.',
            'estado' => 'Activa',
        ],
        [
            'titulo' => 'Plan para diabetes tipo 2',
            'paciente' => 'Elena Ramírez',
            'objetivo' => 'Control glicémico',
            'duracion' => '10 semanas',
            'kcal' => '1,900 kcal',
            'descripcion' => 'Enfoque en carbohidratos de bajo índice glucémico, grasas saludables y desayuno estable.',
            'estado' => 'Activa',
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-strong">Dietas / Planes</h2>
    </x-slot>

    <div class="space-y-6">
        <div class="flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-strong">Dietas y planes</h1>
                <p class="text-sm text-muted mt-1">
                    Administra los planes nutricionales de tus pacientes con una vista rápida por cards.
                </p>
            </div>

            <x-button color="primary" icon="plus" size="sm" label="Nuevo plan" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            @foreach ($dietas as $dieta)
                <article class="group flex min-h-[340px] flex-col rounded-2xl border border-slate-200 bg-gradient-to-br from-white via-slate-50 to-white p-5 shadow-sm ring-1 ring-black/5 transition duration-200 hover:-translate-y-1 hover:shadow-xl dark:border-slate-700 dark:from-slate-900 dark:via-slate-800 dark:to-slate-900">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-primary-100 text-primary-700 shadow-sm dark:bg-primary-900/40 dark:text-primary-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 3v3"></path>
                                    <path d="M16 3v3"></path>
                                    <path d="M3 11h18"></path>
                                    <path d="M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                    <path d="M8 15h8"></path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h2 class="text-base font-bold text-strong leading-snug">{{ $dieta['titulo'] }}</h2>
                                <p class="mt-1 text-xs font-medium text-muted">{{ $dieta['paciente'] }}</p>
                            </div>
                        </div>

                        @php
                            $estadoColors = [
                                'Activa' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300',
                                'En revisión' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300',
                                'Desactivada' => 'bg-red-50 text-red-700 dark:bg-red-900/40 dark:text-red-300',
                            ];
                        @endphp
                        <span class="inline-flex shrink-0 items-center justify-center rounded-full px-2.5 py-1 text-[11px] font-semibold {{ $estadoColors[$dieta['estado']] ?? $estadoColors['Activa'] }}">
                            {{ $dieta['estado'] }}
                        </span>
                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-2 text-sm text-body">
                        <div class="rounded-xl dark:bg-slate-800/70">
                            <span class="block text-[11px] font-semibold uppercase tracking-wide text-muted">Objetivo</span>
                            <span class="mt-1 block text-sm font-semibold text-strong">{{ $dieta['objetivo'] }}</span>
                        </div>
                        <div class="rounded-xl dark:bg-slate-800/70">
                            <span class="block text-[11px] font-semibold uppercase tracking-wide text-muted">Duración</span>
                            <span class="mt-1 block text-sm font-semibold text-strong">{{ $dieta['duracion'] }}</span>
                        </div>
                    </div>

                    <div class="mt-3 rounded-xl bg-primary-50/85 p-3 dark:bg-primary-900/20">
                        <p class="text-[11px] font-semibold uppercase tracking-wide text-primary-700 dark:text-primary-300">Aporte sugerido</p>
                        <p class="mt-1 text-sm font-bold text-strong">{{ $dieta['kcal'] }}</p>
                    </div>

                    <p class="mt-4 text-sm text-muted leading-6">
                        {{ $dieta['descripcion'] }}
                    </p>

                    <div class="mt-auto pt-4">
                        <div class="flex items-center justify-between border-t border-slate-200 pt-4 dark:border-slate-700">
                            <a href="#" class="text-xs font-semibold text-primary-700 hover:underline dark:text-primary-300">Ver detalle</a>
                            <div class="flex items-center gap-2">
                                <x-button variant="soft" color="warning" size="sm" icon="pencil" iconOnly title="Editar dieta" />
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>