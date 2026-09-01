@php
    $dieta = [
        'titulo' => 'Dieta base para mantenimiento',
        'descripcion' => 'Plan equilibrado para conservar peso y energía a lo largo del día.',
        'kcal' => 2000,
    ];

    $pdfUrl = asset('images/menu_semanal.pdf');
    $pdfName = 'dieta_mantenimiento.pdf';

    $recetas = [
        [
            'titulo' => 'Jocón de pollo con arroz integral',
            'descripcion' => 'Guiso tradicional guatemalteco con miltomate, cilantro y pollo desmenuzado servido con arroz integral.',
            'kcal' => 520,
            'tiempo' => '45 min',
        ],
        [
            'titulo' => 'Bowl de quinoa con vegetales',
            'descripcion' => 'Quinoa cocida con brócoli, zanahoria y aderezo de limón; opción vegetariana rica en fibra.',
            'kcal' => 430,
            'tiempo' => '25 min',
        ],
        [
            'titulo' => 'Salmón al horno con espárragos',
            'descripcion' => 'Filete de salmón horneado con hierbas frescas acompañado de espárragos salteados al ajo.',
            'kcal' => 480,
            'tiempo' => '30 min',
        ],
        [
            'titulo' => 'Wrap integral de atún y aguacate',
            'descripcion' => 'Tortilla integral rellena de atún, aguacate, tomate y hojas verdes para una comida ligera.',
            'kcal' => 380,
            'tiempo' => '15 min',
        ],
        [
            'titulo' => 'Curry de garbanzos con arroz',
            'descripcion' => 'Garbanzos guisados en salsa de curry suave con leche de coco, servidos sobre arroz basmati.',
            'kcal' => 460,
            'tiempo' => '35 min',
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">Dietas / Detalle</x-slot>

    <div class="space-y-6">
        {{-- Encabezado --}}
        <div class="flex flex-col md:flex-row items-center justify-center text-start md:items-end md:justify-between gap-4">
            <div class="flex items-start gap-4 md:gap-3 min-w-0">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                    <span class="icon-[lucide--clipboard-list] w-5 h-5"></span>
                </div>
                <div class="min-w-0">
                    <h1 class="text-2xl font-bold text-strong leading-snug">{{ $dieta['titulo'] }}</h1>
                    <p class="text-sm text-muted mt-1">{{ $dieta['descripcion'] }}</p>
                    <div class="mt-2">
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300 px-2.5 py-1 text-xs font-semibold">
                            <span class="icon-[lucide--flame] w-3.5 h-3.5"></span>
                            {{ number_format($dieta['kcal']) }} kcal/día
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <x-button variant="soft" color="primary" size="sm" icon="user-plus" label="Asignar a paciente" />
                <x-button variant="ghost" color="secondary" size="sm" icon="pencil" iconOnly title="Editar dieta" />
            </div>
        </div>

        {{-- PDF del plan --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            {{-- <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
                <span class="icon-[lucide--utensils] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
                <div>
                    <h3 class="text-xl font-semibold text-strong">Menú nutricional</h3>
                    <p class="text-xs text-muted">Vista previa del PDF con el menú semanal de esta dieta.</p>
                </div>
            </div> --}}

            <div class="p-5">
                <div class="max-w-350 mx-auto">
                    <div class="flex items-center justify-between gap-2 mb-2">
                        <div class="flex items-center gap-2 min-w-0">
                            <span class="icon-[lucide--file-text] w-4 h-4 text-primary-700 dark:text-primary-300 shrink-0"></span>
                            <p class="text-sm font-semibold text-strong truncate">{{ $pdfName }}</p>
                        </div>
                        <a href="{{ $pdfUrl }}" target="_blank" rel="noopener"
                           class="inline-flex items-center gap-1 text-xs font-medium text-primary-700 dark:text-primary-300 hover:underline shrink-0">
                            <span class="icon-[lucide--external-link] w-4 h-4"></span>
                            Abrir en nueva pestaña
                        </a>
                    </div>

                    <div class="rounded-default border-card overflow-hidden bg-gray-100 dark:bg-gray-900">
                        <object data="{{ $pdfUrl }}#view=FitH" type="application/pdf" class="w-full h-60 md:h-200">
                            <div class="flex flex-col items-center justify-center gap-2 p-8 text-center">
                                <span class="icon-[lucide--file-warning] w-8 h-8 text-muted"></span>
                                <p class="text-sm text-body">Tu navegador no puede mostrar el PDF integrado.</p>
                                <a href="{{ $pdfUrl }}" target="_blank" rel="noopener"
                                   class="text-xs font-medium text-primary-700 dark:text-primary-300 hover:underline">
                                    Descargar {{ $pdfName }}
                                </a>
                            </div>
                        </object>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recetas --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
                <span class="icon-[lucide--chef-hat] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
                <div>
                    <h3 class="text-xl font-semibold text-strong">Recetas</h3>
                    <p class="text-xs text-muted">Recetas incluidas en esta dieta.</p>
                </div>
            </div>

            <div class="p-5">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($recetas as $receta)
                        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden flex flex-col">
                            <div class="p-4 flex gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                                    <span class="icon-[lucide--file-text] w-5 h-5"></span>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between gap-2">
                                        <p class="text-sm font-bold text-strong leading-snug">{{ $receta['titulo'] }}</p>
                                        <div class="flex items-center gap-1 shrink-0 -mt-1 -mr-1">
                                            <x-button variant="ghost" color="secondary" size="sm" icon="external-link" iconOnly title="Abrir receta" />
                                        </div>
                                    </div>
                                    <p class="mt-1 text-xs text-body leading-snug line-clamp-3">{{ $receta['descripcion'] }}</p>
                                </div>
                            </div>

                            <div class="mt-auto grid grid-cols-2 border-t border-default">
                                <div class="px-4 py-2 text-center">
                                    <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Kcal</p>
                                    <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">{{ number_format($receta['kcal']) }} kcal</p>
                                </div>
                                <div class="px-4 py-2 text-center border-l border-default">
                                    <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Tiempo</p>
                                    <p class="text-sm font-bold text-primary-600 dark:text-primary-400 leading-tight">{{ $receta['tiempo'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
