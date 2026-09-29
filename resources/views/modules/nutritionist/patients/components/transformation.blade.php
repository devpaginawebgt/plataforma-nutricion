@props([
    'recursos' => [
        [
            'tipo'        => 'video',
            'titulo'      => '¡Bienvenido a tu plan nutricional!',
            'descripcion' => 'Este es el inicio de tu transformación. Aquí encontrarás todo lo que necesitas para alcanzar tus metas con el acompañamiento de tu nutrióloga.',
            'thumbnail'   => 'images/transformation/bienvenida.jpg',
            'duracion'    => '5 minutos',
            'tema'        => 'Bienvenida',
        ],
        [
            'tipo'        => 'video',
            'titulo'      => 'Cómo romper el ciclo de comer por ansiedad',
            'descripcion' => 'Aprende a identificar el hambre emocional y a sustituir los atracones por hábitos que calmen la ansiedad sin recurrir a la comida.',
            'thumbnail'   => 'images/transformation/ansiedad.jpg',
            'duracion'    => '18 minutos',
            'tema'        => 'Salud',
        ],
        [
            'tipo'        => 'video',
            'titulo'      => 'Construye tu rutina de comidas ideal',
            'descripcion' => 'Guía práctica para organizar tus tiempos de comida, evitar largos ayunos involuntarios y mantener energía estable durante el día.',
            'thumbnail'   => 'images/transformation/rutina-comidas.jpg',
            'duracion'    => '22 minutos',
            'tema'        => 'Alimentación',
        ],
        [
            'tipo'        => 'pdf',
            'titulo'      => 'Guía para mejorar tu hábito de sueño',
            'descripcion' => 'Rutinas de higiene del sueño, horarios recomendados y su impacto directo en el metabolismo y el control del peso corporal.',
            'archivo'     => 'docs/guia-sueno.pdf',
            'paginas'     => '12 páginas',
            'tema'        => 'Sueño',
        ],
    ],
])

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    @foreach ($recursos as $recurso)
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden flex flex-col">
            <div class="p-4 flex gap-3">

                {{-- Thumbnail: video con play / pdf con icono --}}
                @if ($recurso['tipo'] === 'pdf')
                    <div class="w-32 h-24 rounded-default shrink-0 bg-red-50 dark:bg-red-900/30 flex flex-col items-center justify-center gap-1.5">
                        <span class="icon-[lucide--file] w-8 h-8 text-red-500 dark:text-red-400"></span>
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
                    <p class="text-sm font-bold text-strong truncate">{{ $recurso['titulo'] }}</p>
                    <p class="mt-1 text-xs text-body leading-snug line-clamp-3">{{ $recurso['descripcion'] }}</p>
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
                    <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Tema</p>
                    <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">{{ $recurso['tema'] }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
