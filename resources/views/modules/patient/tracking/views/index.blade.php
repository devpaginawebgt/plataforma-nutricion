<x-app-layout>
    <x-slot name="header">Mi progreso</x-slot>

    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-strong">Mi progreso</h1>
            <p class="text-sm text-muted mt-1">
                Revisa tu evolución, mediciones y avances a lo largo del tiempo.
            </p>
        </div>

        {{-- Peso inicial + peso actual + meta --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <x-patient-dashboard::weight-card
                label="Peso inicial"
                value="187"
                unit="lbs"
                date="15/01/2026"
                icon="flag"
                color="blue"
            />
            <x-patient-dashboard::weight-card
                label="Peso actual"
                value="172"
                unit="lbs"
                date="20/07/2026"
                icon="scale"
                color="primary"
            />
            <x-patient-dashboard::weight-card
                label="Meta de peso"
                value="159"
                unit="lbs"
                date="31/12/2026"
                icon="target"
                color="green"
            />
        </div>

        {{-- Gráfica de avance de peso --}}
        <x-patient-dashboard::weight-chart
            :inicial="187"
            :actual="172"
            :meta="159"
        />

        {{-- Mediciones --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="px-5 pt-5">
                <div class="flex items-center gap-2 mb-1">
                    <span class="icon-[lucide--ruler] w-5 h-5 text-primary-700 dark:text-primary-300"></span>
                    <p class="text-lg font-semibold text-strong">Mediciones</p>
                </div>
                {{-- <p class="text-xs text-muted">Última actualización: 20/07/2026</p> --}}
            </div>

            <div class="flex flex-wrap justify-center gap-4 p-5">
                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">162 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Talla</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">84 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cintura</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">102 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Cadera</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">35 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Pantorrilla</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">54 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Muslo</p>
                </div>

                <div class="rounded-default border-card bg-surface p-4 text-center w-[calc(50%-0.5rem)] sm:w-[calc(25%-0.75rem)]">
                    <div class="w-10 h-10 mx-auto rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center mb-2">
                        <span class="icon-[lucide--ruler] w-5 h-5"></span>
                    </div>
                    <p class="text-lg font-bold text-strong">28 cm</p>
                    <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">C. Brazo</p>
                </div>
            </div>
        </div>

        {{-- Comparativa --}}
        <div class="bg-surface rounded-default shadow-card border-card overflow-hidden">
            <div class="px-5 pt-5">
                <div class="flex items-center gap-2 mb-1">
                    <p class="text-lg font-semibold text-strong">Historia</p>
                </div>
                <p class="text-xs text-muted flex items-center gap-1.5 mt-2">
                    <span class="icon-[lucide--lock] w-3.5 h-3.5"></span>
                    Las fotos que subas son privadas y solo tú podrás verlas.
                </p>
            </div>

            <div class="p-5">
                <label for="progress-photo-upload" class="flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-primary-900/10 px-4 py-6 cursor-pointer transition mb-4">
                    <span class="icon-[lucide--image-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
                    <div>
                        <p class="text-sm font-semibold text-strong">Subir foto de progreso</p>
                        <p class="text-xs text-muted">Formato JPG o PNG · arrastra el archivo o haz clic para seleccionarlo</p>
                    </div>
                    <input id="progress-photo-upload" type="file" accept="image/*" class="hidden">
                </label>

                <div class="flex flex-wrap gap-4">
                    <figure class="rounded-default border-card bg-surface overflow-hidden w-40">
                        <img src="{{ asset('images/persona-1.png') }}" alt="Foto de progreso inicial" class="w-full h-48 object-contain">
                        <figcaption class="px-3 py-2 border-t border-default">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <p class="text-xs font-semibold text-strong truncate">Foto inicial</p>
                                <span class="inline-flex items-center rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-300 px-2 py-0.5 text-2xs font-medium">Inicio</span>
                            </div>
                            <p class="text-xs text-muted flex items-center gap-1">
                                <span class="icon-[lucide--calendar] w-3 h-3"></span>
                                15/01/2026
                            </p>
                        </figcaption>
                    </figure>

                    <figure class="rounded-default border-card bg-surface overflow-hidden w-40">
                        <img src="{{ asset('images/persona-2.jpg') }}" alt="Foto de progreso actual" class="w-full h-48 object-contain">
                        <figcaption class="px-3 py-2 border-t border-default">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <p class="text-xs font-semibold text-strong truncate">Foto actual</p>
                                <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-2 py-0.5 text-2xs font-medium">Actual</span>
                            </div>
                            <p class="text-xs text-muted flex items-center gap-1">
                                <span class="icon-[lucide--calendar] w-3 h-3"></span>
                                20/07/2026
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
