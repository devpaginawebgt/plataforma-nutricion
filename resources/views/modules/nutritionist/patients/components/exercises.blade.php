@props([
    'ejercicios' => [
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
    ],
])

<div class="space-y-4">
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
                        <p class="text-sm font-bold text-strong truncate">{{ $ejercicio['nombre'] }}</p>
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
</div>
