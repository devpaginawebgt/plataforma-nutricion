@props([
    'id' => 'new-recipe-drawer',
])

{{-- Drawer (Flowbite) — se abre desde la derecha.
     Trigger: <button data-drawer-target="{{ $id }}" data-drawer-show="{{ $id }}" data-drawer-placement="right" aria-controls="{{ $id }}">...</button> --}}
<div
    id="{{ $id }}"
    class="fixed top-0 right-0 z-50 h-screen w-96 max-w-full p-6 overflow-y-auto transition-transform translate-x-full bg-surface"
    tabindex="-1"
    aria-labelledby="{{ $id }}-label"
    aria-hidden="true"
    data-drawer-placement="right"
>
    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-6">
        <h5 id="{{ $id }}-label" class="inline-flex items-center gap-2 text-base font-semibold text-strong">
            <span class="icon-[lucide--chef-hat] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Nueva receta
        </h5>

        <button
            type="button"
            data-drawer-hide="{{ $id }}"
            aria-controls="{{ $id }}"
            class="inline-flex items-center justify-center w-8 h-8 text-muted bg-transparent rounded-input hover:bg-gray-100 hover:text-strong dark:hover:bg-gray-700"
        >
            <span class="icon-[lucide--x] w-4 h-4"></span>
            <span class="sr-only">Cerrar panel</span>
        </button>
    </div>

    {{-- Formulario --}}
    <form class="space-y-5" enctype="multipart/form-data">
        {{-- Título --}}
        <div>
            <x-input-label for="{{ $id }}-title" value="Título" />
            <x-text-input
                id="{{ $id }}-title"
                name="title"
                type="text"
                maxlength="80"
                placeholder="Ej: Jocón de pollo con arroz integral"
                class="mt-1"
            />
        </div>

        {{-- Descripción --}}
        <div>
            <x-input-label for="{{ $id }}-description" value="Descripción" />
            <textarea
                id="{{ $id }}-description"
                name="description"
                rows="4"
                maxlength="500"
                placeholder="Breve descripción de la receta..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
            <p class="mt-1 text-2xs text-muted">Máximo 500 caracteres.</p>
        </div>

        {{-- Kcal --}}
        <div>
            <x-input-label for="{{ $id }}-kcal" value="Kcal" />
            <div class="relative mt-1">
                <x-text-input
                    id="{{ $id }}-kcal"
                    name="kcal"
                    type="number"
                    min="0"
                    step="1"
                    placeholder="Ej: 450"
                    class="pr-14 w-full"
                />
                <span class="absolute inset-y-0 right-3 flex items-center text-xs font-semibold text-muted pointer-events-none">
                    kcal
                </span>
            </div>
        </div>

        {{-- PDF --}}
        <div>
            <x-input-label value="Archivo PDF" />
            <label for="{{ $id }}-pdf" class="mt-1 flex items-center justify-center gap-3 rounded-default border-2 border-dashed border-default hover:border-primary-400 dark:hover:border-primary-600 bg-primary-50/40 dark:bg-gray-900/50 px-4 py-6 cursor-pointer transition">
                <span class="icon-[lucide--file-up] w-6 h-6 text-primary-700 dark:text-primary-300 shrink-0"></span>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-strong">Subir receta</p>
                    <p class="text-xs text-muted">Formato PDF · haz clic para seleccionar</p>
                </div>
                <input id="{{ $id }}-pdf" name="pdf" type="file" accept="application/pdf" class="hidden">
            </label>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar receta"
                class="flex-1 justify-center"
            />
            <x-button
                variant="soft"
                color="secondary"
                label="Cancelar"
                data-drawer-hide="{{ $id }}"
                aria-controls="{{ $id }}"
            />
        </div>
    </form>
</div>
