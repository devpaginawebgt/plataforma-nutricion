@props([
    'peso' => '151.5 lb',
    'talla' => '162 cm',
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
