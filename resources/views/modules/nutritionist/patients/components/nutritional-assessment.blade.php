@props([
    'peso' => '151.5 lb',
    'talla' => '162 cm',
    'imc' => '26.1',
    'imcCategoria' => 'Sobrepeso',
    'grasa' => '31.2 %',
    'musculo' => '27.8 %',
    'aguaCorporal' => '48.5 %',
    'grasaVisceral' => '7',
    'masaOsea' => '2.6 kg',
    'edadMetabolica' => '34 años',
    'cintura' => '84 cm',
    'cadera' => '102 cm',
    'pantorrillaIzq' => '35 cm',
    'pantorrillaDer' => '35 cm',
    'musloIzq' => '54 cm',
    'musloDer' => '54 cm',
    'brazoIzq' => '28 cm',
    'brazoDer' => '28 cm',
    'kcalObjetivo' => '1,940',
    'porciones' => [
        ['label' => 'Proteínas', 'cantidad' => 3, 'dotClass' => 'bg-primary-600'],
        ['label' => 'Carbohidratos', 'cantidad' => 4, 'dotClass' => 'bg-blue-600'],
        ['label' => 'Grasas saludables', 'cantidad' => 2, 'dotClass' => 'bg-orange-500'],
        ['label' => 'Vegetales', 'cantidad' => 5, 'dotClass' => 'bg-green-600'],
        ['label' => 'Frutas', 'cantidad' => 3, 'dotClass' => 'bg-rose-500'],
        ['label' => 'Lácteos', 'cantidad' => 2, 'dotClass' => 'bg-amber-500'],
    ],
])

@php
    $pesoLb = (float) filter_var($peso, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $pesoKg = round($pesoLb * 0.453592, 1);

    $tallaCm = (float) filter_var($talla, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tallaM2 = ($tallaCm / 100) ** 2;
    $imc = $tallaM2 > 0 ? round($pesoKg / $tallaM2, 1) : 0;

    $cinturaCm = (float) filter_var($cintura, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $caderaCm = (float) filter_var($cadera, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $relacionCinturaCadera = $caderaCm > 0 ? round($cinturaCm / $caderaCm, 2) : 0;
@endphp

<div class="space-y-4">
<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    <div class="flex items-center gap-2 px-5 py-3 border-b border-default">
        <span class="icon-[lucide--ruler] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1"></span>
        <h3 class="text-xl font-semibold text-strong">Antropométrico</h3>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-center gap-4 p-5">
        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--scale] w-5 h-5"></span>
            </div>
            <p class="w-full text-lg font-bold flex flex-col sm:flex-row justify-center items-center sm:gap-2">
                <span>{{ $pesoLb }} lbs</span>
                <span class="hidden sm:inline text-muted">&nbsp;|&nbsp;</span>
                <span>{{ $pesoKg }} kgs</span>
            </p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Peso</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $talla }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Talla</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--gauge] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $imc }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">IMC</p>
            <span class="inline-block mt-1 rounded-full bg-orange-100 dark:bg-orange-900/40 text-orange-700 dark:text-orange-300 px-2 py-0.5 text-2xs font-medium">{{ $imcCategoria }}</span>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--droplet] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $grasa }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">% Grasa</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--dumbbell] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $musculo }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">% Músculo</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-cyan-100 dark:bg-cyan-900/40 text-cyan-700 dark:text-cyan-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--droplets] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $aguaCorporal }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">% Agua corporal</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-rose-100 dark:bg-rose-900/40 text-rose-700 dark:text-rose-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--activity] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $grasaVisceral }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Grasa visceral</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-amber-100 dark:bg-amber-900/40 text-amber-700 dark:text-amber-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--bone] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $masaOsea }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Masa ósea</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--calendar-clock] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $edadMetabolica }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Edad metabólica</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $cintura }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cintura</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $cadera }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cadera</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-teal-100 dark:bg-teal-900/40 text-teal-700 dark:text-teal-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--divide] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $relacionCinturaCadera }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cintura / Cadera</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $pantorrillaIzq }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Pantorrilla Izq.</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $pantorrillaDer }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Pantorrilla Der.</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $musloIzq }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Muslo Izq.</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $musloDer }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Muslo Der.</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $brazoIzq }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">C. Brazo Izq.</p>
        </div>

        <div class="rounded-default border-card bg-surface p-4 text-center">
            <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                <span class="icon-[lucide--ruler] w-5 h-5"></span>
            </div>
            <p class="text-lg font-bold text-strong">{{ $brazoDer }}</p>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">C. Brazo Der.</p>
        </div>
    </div>
</div>

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    <div class="flex items-center gap-2 px-5 py-4 border-b border-default">
        <span class="icon-[lucide--stethoscope] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1"></span>
        <h3 class="text-xl font-semibold text-strong">Clínico</h3>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 p-5">
        <div>
            <p class="text-sm font-semibold text-strong mb-2">Antecedentes médicos</p>
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-medium">
                    Diabetes Mellitus II
                </span>
            </div>
        </div>

        <div>
            <p class="text-sm font-semibold text-strong mb-2">Antecedentes quirúrgicos</p>
            <p class="text-xs text-muted">Ninguno</p>
        </div>

        <div>
            <p class="text-sm font-semibold text-strong mb-2">Antecedentes familiares</p>
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-medium">
                    Hipertensión arterial
                </span>
            </div>
        </div>

        <div>
            <p class="text-sm font-semibold text-strong mb-2">Sistemas</p>
            <div class="flex flex-wrap gap-2">
                <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-medium">
                    Dolor de cabeza
                </span>
            </div>
        </div>
    </div>
</div>

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    <div class="flex items-start gap-2 px-5 py-3 border-b border-default">
        <span class="icon-[lucide--apple] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1 mt-2"></span>
        <div>
            <h3 class="text-xl font-semibold text-strong">Dietético</h3>
            <p class="text-xs text-muted">Cálculo de calorías, porciones y frecuencia de consumo.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 items-start gap-4 px-5 pt-5">
        <div class="rounded-default border-card bg-surface p-4">
            <div class="flex items-center gap-2 mb-1">
                <span class="w-8 h-8 rounded-full bg-cyan-100 dark:bg-cyan-900/40 text-cyan-700 dark:text-cyan-300 flex items-center justify-center">
                    <span class="icon-[lucide--droplet] w-4 h-4"></span>
                </span>
                <div>
                    <p class="text-sm font-semibold text-strong">¿Cuántas kcal tiene la dieta?</p>
                    <p class="text-xs text-muted">Ingresa el total de calorías de tu dieta.</p>
                </div>
            </div>
            <div class="mt-3 relative">
                <x-text-input type="number" placeholder="Ej. 1500" class="pr-14" />
                <span class="absolute inset-y-0 right-0 flex items-center px-3 rounded-r-input bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 text-xs font-semibold uppercase">kcal</span>
            </div>
        </div>

        <div class="rounded-default border-card bg-surface p-4">
            <div class="flex items-center gap-2 mb-3">
                <span class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center">
                    <span class="icon-[lucide--calculator] w-4 h-4"></span>
                </span>
                <div>
                    <p class="text-sm font-semibold text-strong">¿Cuántas kcal deberías tener?</p>
                    <p class="text-xs text-muted">Calculado con la fórmula de Harris y Benedict.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-3">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Fórmula</p>
                    <p class="text-sm font-semibold text-strong">Harris y Benedict</p>
                </div>
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Gasto energético basal</p>
                    <p class="text-sm font-semibold text-primary-700 dark:text-primary-300">1385 kcal</p>
                </div>
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Factor de actividad</p>
                    <p class="text-sm font-semibold text-strong">1.40 (Moderado)</p>
                </div>
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Total recomendado</p>
                    <p class="text-sm font-semibold text-primary-700 dark:text-primary-300">1940 kcal/día</p>
                </div>
            </div>

            <div class="mt-3 flex items-center gap-2 rounded-default bg-primary-50/60 dark:bg-primary-900/10 border-card px-3 py-2">
                <span class="icon-[lucide--info] w-4 h-4 text-primary-700 dark:text-primary-300 shrink-0"></span>
                <p class="text-xs text-body">Este cálculo es una referencia. Ajusta según tus objetivos y condición clínica.</p>
            </div>
        </div>
    </div>

    <div class="p-5 md:pt-0">
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
                </div>
            </div>

            <div>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-2">Porciones por día</p>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                    @foreach ($porciones as $porcion)
                        <div class="flex items-center justify-between gap-2 rounded-default border-card bg-surface px-3 py-2">
                            <div class="flex items-center gap-2 min-w-0">
                                <span class="w-2 h-2 rounded-full {{ $porcion['dotClass'] }} shrink-0"></span>
                                <span class="text-xs font-medium text-body truncate">{{ $porcion['label'] }}</span>
                            </div>
                            <span class="text-sm font-bold text-strong shrink-0">{{ $porcion['cantidad'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-nutritionist-patients::food-frequency />
</div>

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
    <div class="flex items-center gap-2 px-5 py-3 border-b border-default">
        <span class="icon-[lucide--flask-conical] w-5 h-5 text-primary-700 dark:text-primary-300 mr-1"></span>
        <div>
            <h3 class="text-xl font-semibold text-strong">Bioquímico</h3>
            <p class="text-xs text-muted">Resultados de laboratorio y estudios complementarios.</p>
        </div>
    </div>

    <div class="p-5">
        <p class="text-[11px] font-semibold uppercase tracking-wide text-muted mb-2">Laboratorios</p>
        <label for="lab-pdf-upload" class="flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-gray-900/50 px-4 py-6 cursor-pointer transition">
            <span class="icon-[lucide--file-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
            <div>
                <p class="text-sm font-semibold text-strong">Subir resultado de Laboratorio</p>
                <p class="text-xs text-muted">Formato PDF · arrastra el archivo o haz clic para seleccionarlo</p>
            </div>
            <input id="lab-pdf-upload" type="file" accept="application/pdf" class="hidden">
        </label>
    </div>
</div>
</div>
