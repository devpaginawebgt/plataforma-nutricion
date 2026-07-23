@props([
    'peso' => '151.5 lb',
    'talla' => '162 cm',
    'imc' => '26.1',
    'imcCategoria' => 'Sobrepeso',
    'grasa' => '31.2 %',
    'musculo' => '27.8 %',
    'cintura' => '84 cm',
    'cadera' => '102 cm',
    'pantorrilla' => '35 cm',
    'muslo' => '54 cm',
    'brazo' => '28 cm',
    'objetivo' => 'Pérdida de grasa corporal',
    'kcalObjetivo' => '1,650',
    'proteinas' => 30,
    'carbohidratos' => 40,
    'grasas' => 30,
])

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    <div class="flex flex-wrap justify-center gap-4 p-5">
        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--scale] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $peso }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Peso</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $talla }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Talla</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--gauge] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $imc }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">IMC</p>
            <span class="inline-block mt-1 rounded-full bg-orange-100 dark:bg-orange-900/40 text-orange-700 dark:text-orange-300 px-2 py-0.5 text-2xs font-medium">{{ $imcCategoria }}</span>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--droplet] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $grasa }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">% Grasa</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--dumbbell] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $musculo }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">% Músculo</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $cintura }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cintura</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $cadera }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cadera</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $pantorrilla }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Pantorrilla</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $muslo }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Muslo</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $brazo }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">C. Brazo</p>
        </div>
    </div>

    <div class="border-t border-default px-5 py-4">
        <div class="flex items-center gap-2 mb-4">
            <span class="icon-[lucide--target] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Objetivos y cálculo de Kcal</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-4 items-center rounded-default bg-primary-50/60 dark:bg-primary-900/10 border-card p-4">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-full bg-primary-700 text-white flex flex-col items-center justify-center shrink-0">
                    <span class="icon-[lucide--flame] w-5 h-5"></span>
                </div>
                <div>
                    <p class="text-2xl font-bold text-strong">{{ $kcalObjetivo }} <span class="text-sm font-medium text-muted">kcal/día</span></p>
                    <span class="inline-block mt-1 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-2.5 py-0.5 text-xs font-medium">{{ $objetivo }}</span>
                </div>
            </div>

            <div class="space-y-2">
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="font-medium text-body">Proteínas</span>
                        <span class="text-muted">{{ $proteinas }}%</span>
                    </div>
                    <div class="h-2 rounded-full bg-primary-100 dark:bg-primary-900/40 overflow-hidden">
                        <div class="h-full bg-primary-600" style="width: {{ $proteinas }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="font-medium text-body">Carbohidratos</span>
                        <span class="text-muted">{{ $carbohidratos }}%</span>
                    </div>
                    <div class="h-2 rounded-full bg-blue-100 dark:bg-blue-900/40 overflow-hidden">
                        <div class="h-full bg-blue-600" style="width: {{ $carbohidratos }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between text-xs mb-1">
                        <span class="font-medium text-body">Grasas</span>
                        <span class="text-muted">{{ $grasas }}%</span>
                    </div>
                    <div class="h-2 rounded-full bg-orange-100 dark:bg-orange-900/40 overflow-hidden">
                        <div class="h-full bg-orange-500" style="width: {{ $grasas }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
