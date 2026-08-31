@php
    // Ejercicios ficticios — catálogo que la nutrióloga podrá reutilizar y asignar a cada paciente.
    $ejercicios = [
        [
            'nombre' => 'Sentadilla',
            'descripcion' => 'Mantén la espalda recta y baja hasta que tus muslos estén paralelos al suelo.',
            'thumbnail' => 'images/exercises/sentadilla.jpg',
            'recurrencia' => '3 veces a la semana',
            'tiempo' => '10 minutos',
        ],
        [
            'nombre' => 'Press de pecho',
            'descripcion' => 'Acuéstate en el banco, agarra la barra con un agarre ligeramente más ancho que tus hombros y empuja hacia arriba.',
            'thumbnail' => 'images/exercises/press-pecho.jpg',
            'recurrencia' => '3 veces a la semana',
            'tiempo' => '15 minutos',
        ],
        [
            'nombre' => 'Peso muerto',
            'descripcion' => 'Con los pies al ancho de las caderas, baja tomando la barra y sube extendiendo caderas y rodillas.',
            'thumbnail' => 'images/exercises/peso-muerto.jpg',
            'recurrencia' => '2 veces a la semana',
            'tiempo' => '12 minutos',
        ],
        [
            'nombre' => 'Plancha frontal',
            'descripcion' => 'Apóyate sobre antebrazos y puntas de los pies, mantén el cuerpo alineado y el abdomen contraído.',
            'thumbnail' => 'images/exercises/plancha.jpg',
            'recurrencia' => '4 veces a la semana',
            'tiempo' => '5 minutos',
        ],
        [
            'nombre' => 'Zancadas',
            'descripcion' => 'Da un paso al frente flexionando ambas rodillas a 90°, mantén el torso erguido y regresa a la posición inicial.',
            'thumbnail' => 'images/exercises/zancadas.jpg',
            'recurrencia' => '3 veces a la semana',
            'tiempo' => '8 minutos',
        ],
        [
            'nombre' => 'Remo con barra',
            'descripcion' => 'Inclínate ligeramente al frente y tira de la barra hacia el abdomen contrayendo la espalda.',
            'thumbnail' => 'images/exercises/remo.jpg',
            'recurrencia' => '2 veces a la semana',
            'tiempo' => '10 minutos',
        ],
        [
            'nombre' => 'Elevación de talones',
            'descripcion' => 'De pie, eleva los talones contrayendo los gemelos y baja lentamente controlando el movimiento.',
            'thumbnail' => 'images/exercises/talones.jpg',
            'recurrencia' => '3 veces a la semana',
            'tiempo' => '6 minutos',
        ],
        [
            'nombre' => 'Curl de bíceps',
            'descripcion' => 'Con mancuernas, flexiona los codos llevando el peso hacia los hombros sin balancear el torso.',
            'thumbnail' => 'images/exercises/curl-biceps.jpg',
            'recurrencia' => '2 veces a la semana',
            'tiempo' => '8 minutos',
        ],
        [
            'nombre' => 'Bicicleta estática',
            'descripcion' => 'Pedaleo continuo a ritmo moderado para trabajar la resistencia cardiovascular y la musculatura de piernas.',
            'thumbnail' => 'images/exercises/bicicleta.jpg',
            'recurrencia' => '4 veces a la semana',
            'tiempo' => '20 minutos',
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">Ejercicios / Listado</x-slot>

    {{-- Encabezado --}}
    <div class="flex flex-col items-center gap-3 mb-6 sm:flex-row sm:items-end sm:justify-between sm:gap-4">
        <div class="text-center sm:text-left">
            <h1 class="text-xl font-bold text-strong sm:text-2xl">Ejercicios</h1>
            <p class="text-sm text-muted mt-1">
                Catálogo de ejercicios que puedes asignar a tus pacientes.
            </p>
        </div>

        <x-button
            color="primary"
            icon="plus"
            size="sm"
            label="Nuevo ejercicio"
            data-drawer-target="new-exercise-drawer"
            data-drawer-show="new-exercise-drawer"
            data-drawer-placement="right"
            aria-controls="new-exercise-drawer"
        />
    </div>

    {{-- Filtros --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end mb-6">
        <div class="w-full sm:w-auto sm:flex-1 sm:max-w-sm">
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--search] w-4 h-4"></span>
                </div>
                <x-text-input id="exercises-search" type="search" placeholder="Buscar por nombre..." class="ps-10 text-sm bg-white dark:bg-gray-800" />
            </div>
        </div>

        <x-button color="primary" icon="filter" iconOnly title="Filtrar" class="mb-1" />
    </div>

    {{-- Grid de ejercicios --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @foreach ($ejercicios as $ejercicio)
            <div class="bg-surface rounded-default shadow-card border-card overflow-hidden flex flex-col">
                <div class="p-4 flex gap-3">
                    <div class="relative w-32 h-24 rounded-default overflow-hidden shrink-0 bg-gray-200 dark:bg-gray-700">
                        <img src="{{ asset($ejercicio['thumbnail']) }}"
                             alt="{{ $ejercicio['nombre'] }}"
                             class="w-full h-full object-cover"
                             onerror="this.style.display='none'">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center backdrop-blur-sm">
                                <span class="icon-[lucide--play] w-4 h-4 translate-x-px"></span>
                            </span>
                        </div>
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-2">
                            <p class="text-sm font-bold text-strong truncate">{{ $ejercicio['nombre'] }}</p>
                            <div class="flex items-center gap-1 shrink-0 -mt-1 -mr-1">
                                <x-button variant="ghost" color="primary" size="sm" icon="user-plus" iconOnly title="Asignar a paciente" />
                                <x-button variant="ghost" color="secondary" size="sm" icon="pencil" iconOnly title="Editar ejercicio" />
                                <x-button variant="ghost" color="danger" size="sm" icon="trash-2" iconOnly title="Eliminar ejercicio" />
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-body leading-snug line-clamp-3">{{ $ejercicio['descripcion'] }}</p>
                    </div>
                </div>

                <div class="mt-auto grid grid-cols-2 border-t border-default">
                    <div class="px-4 py-2 text-center">
                        <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Recurrencia</p>
                        <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">{{ $ejercicio['recurrencia'] }}</p>
                    </div>
                    <div class="px-4 py-2 text-center border-l border-default">
                        <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Tiempo</p>
                        <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">{{ $ejercicio['tiempo'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
