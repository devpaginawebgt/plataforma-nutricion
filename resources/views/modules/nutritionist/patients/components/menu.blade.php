@props([
    'pdfUrl' => asset('images/menu_semanal.pdf'),
    'pdfName' => 'menu_semanal.pdf',
    'recetas' => [
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
    ],
])

<div class="space-y-4">
    <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
        <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
            <span class="icon-[lucide--utensils] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-1"></span>
            <div>
                <h3 class="text-xl font-semibold text-strong">Menú nutricional</h3>
                <p class="text-xs text-muted">Sube el PDF del menú semanal del paciente y visualiza una vista previa.</p>
            </div>
        </div>

        <div class="p-5 space-y-4">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-2">Menú semanal (PDF)</p>
                <label for="menu-pdf-upload" class="flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-gray-900/50 px-4 py-6 cursor-pointer transition">
                    <span class="icon-[lucide--file-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
                    <div>
                        <p class="text-sm font-semibold text-strong">Subir menú nutricional</p>
                        <p class="text-xs text-muted">Formato PDF · arrastra el archivo o haz clic para seleccionarlo</p>
                    </div>
                    <input id="menu-pdf-upload" type="file" accept="application/pdf" class="hidden">
                </label>
            </div>

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
                <p class="text-xs text-muted">Recetas incluidas en este menú.</p>
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
                                        <x-button variant="ghost" color="secondary" size="sm" icon="external-link" iconOnly title="Abrir" />
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
