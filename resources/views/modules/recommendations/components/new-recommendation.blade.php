@props([
    'id' => 'new-recommendation-drawer',
])

{{-- Drawer (Flowbite) — se abre desde la derecha.
     Trigger: <button data-drawer-target="{{ $id }}" data-drawer-show="{{ $id }}" data-drawer-placement="right" aria-controls="{{ $id }}">...</button> --}}
<div
    id="{{ $id }}"
    class="fixed top-0 right-0 z-40 h-screen w-96 max-w-full p-6 overflow-y-auto transition-transform translate-x-full bg-surface"
    tabindex="-1"
    aria-labelledby="{{ $id }}-label"
    aria-hidden="true"
    data-drawer-placement="right"
>
    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-6">
        <h5 id="{{ $id }}-label" class="inline-flex items-center gap-2 text-base font-semibold text-strong">
            <span class="icon-[lucide--lightbulb] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Nueva recomendación
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
    <form class="space-y-5">
        {{-- Título --}}
        <div>
            <x-input-label for="{{ $id }}-title" value="Título" />
            <x-text-input
                id="{{ $id }}-title"
                name="title"
                type="text"
                placeholder="Ej: Hidratación diaria"
                class="mt-1"
            />
        </div>

        {{-- Descripción --}}
        <div>
            <x-input-label for="{{ $id }}-text" value="Descripción" />
            <textarea
                id="{{ $id }}-text"
                name="text"
                rows="6"
                placeholder="Escribe el detalle de la recomendación..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar recomendación"
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
