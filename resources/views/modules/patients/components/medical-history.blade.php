@props([
    'diagnosticos' => ['Hipertensión arterial', 'Diabetes tipo 2'],
    'medicamentos' => ['Metformina 850mg', 'Losartán 50mg'],
    'alergias' => ['Penicilina', 'Mariscos'],
    'antecedentesFamiliares' => ['Diabetes (madre)', 'Cardiopatía (padre)'],
    'sintomas' => ['Fatiga', 'Dolor de cabeza frecuente'],
])

<div class="bg-surface rounded-default shadow-card border-card overflow-hidden">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5">
        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="icon-[lucide--stethoscope] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Diagnósticos</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @forelse ($diagnosticos as $item)
                    <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-medium">{{ $item }}</span>
                @empty
                    <span class="text-sm text-muted">Sin registros</span>
                @endforelse
            </div>
        </div>

        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="icon-[lucide--pill] w-4 h-4 text-blue-700 dark:text-blue-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Medicamentos</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @forelse ($medicamentos as $item)
                    <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 px-3 py-1 text-xs font-medium">{{ $item }}</span>
                @empty
                    <span class="text-sm text-muted">Sin registros</span>
                @endforelse
            </div>
        </div>

        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="icon-[lucide--shield-alert] w-4 h-4 text-orange-600 dark:text-orange-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Alergias</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @forelse ($alergias as $item)
                    <span class="inline-flex items-center rounded-full bg-orange-100 dark:bg-orange-900/40 text-orange-700 dark:text-orange-300 px-3 py-1 text-xs font-medium">{{ $item }}</span>
                @empty
                    <span class="text-sm text-muted">Sin registros</span>
                @endforelse
            </div>
        </div>

        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="icon-[lucide--users] w-4 h-4 text-gray-600 dark:text-gray-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Antecedentes familiares</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @forelse ($antecedentesFamiliares as $item)
                    <span class="inline-flex items-center rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-3 py-1 text-xs font-medium">{{ $item }}</span>
                @empty
                    <span class="text-sm text-muted">Sin registros</span>
                @endforelse
            </div>
        </div>

        <div class="md:col-span-2">
            <div class="flex items-center gap-2 mb-3">
                <span class="icon-[lucide--activity] w-4 h-4 text-purple-700 dark:text-purple-300"></span>
                <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Síntomas</p>
            </div>
            <div class="flex flex-wrap gap-2">
                @forelse ($sintomas as $item)
                    <span class="inline-flex items-center rounded-full bg-purple-100 dark:bg-purple-900/40 text-purple-700 dark:text-purple-300 px-3 py-1 text-xs font-medium">{{ $item }}</span>
                @empty
                    <span class="text-sm text-muted">Sin registros</span>
                @endforelse
            </div>
        </div>
    </div>
    
    <div class="border-t border-default px-5 py-4">
        <div class="flex items-center gap-2 mb-3">
            <span class="icon-[lucide--flask-conical] w-4 h-4 text-green-700 dark:text-green-300"></span>
            <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Laboratorios</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-4 items-stretch">
            <label for="lab-pdf-upload" class="flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-primary-900/10 px-4 py-6 cursor-pointer transition">
                <span class="icon-[lucide--file-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
                <div>
                    <p class="text-sm font-semibold text-strong">Subir resultado de laboratorio</p>
                    <p class="text-xs text-muted">Formato PDF · arrastra el archivo o haz clic para seleccionarlo</p>
                </div>
                <input id="lab-pdf-upload" type="file" accept="application/pdf" class="hidden">
            </label>
            <!--
            <div class="flex items-center gap-3 rounded-default border-card bg-surface px-4 py-3">
                <div class="w-14 h-14 rounded-default bg-gray-100 dark:bg-gray-700 flex items-center justify-center shrink-0">
                    <span class="icon-[lucide--qr-code] w-8 h-8 text-strong"></span>
                </div>
                <div>
                    <p class="text-sm font-semibold text-strong">Código QR</p>
                    <p class="text-xs text-muted">Escanea para ver el<br>expediente en línea</p>
                </div>
            </div>
            -->
        </div>
    </div>
    
</div>
