@props([
    'id' => 'new-exercise-drawer',
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
            <span class="icon-[lucide--dumbbell] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Nuevo ejercicio
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
                maxlength="28"
                placeholder="Ej: Sentadilla"
                class="mt-1"
            />
            <p class="mt-1 text-2xs text-muted">Máximo 28 caracteres.</p>
        </div>

        {{-- Descripción --}}
        <div>
            <x-input-label for="{{ $id }}-description" value="Descripción" />
            <textarea
                id="{{ $id }}-description"
                name="description"
                rows="4"
                maxlength="500"
                placeholder="Breve descripción del ejercicio..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
            <p class="mt-1 text-2xs text-muted">Máximo 500 caracteres.</p>
        </div>

        {{-- Link --}}
        <div>
            <x-input-label for="{{ $id }}-link" value="Link" />
            <x-text-input
                id="{{ $id }}-link"
                name="link"
                type="url"
                maxlength="255"
                placeholder="https://..."
                class="mt-1"
            />
            <p class="mt-1 text-2xs text-muted">Máximo 255 caracteres.</p>
        </div>

        {{-- Recurrencia --}}
        <div>
            <x-input-label for="{{ $id }}-recurrence" value="Recurrencia" />
            <x-select id="{{ $id }}-recurrence" name="recurrence" class="mt-1">
                <option value="" disabled selected>Selecciona la recurrencia</option>
                <option value="2">2 veces por semana</option>
                <option value="3">3 veces por semana</option>
                <option value="4">4 veces por semana</option>
            </x-select>
        </div>

        {{-- Tiempo --}}
        <div>
            <x-input-label for="{{ $id }}-time" value="Tiempo" />
            <x-select id="{{ $id }}-time" name="time" class="mt-1">
                <option value="" disabled selected>Selecciona el tiempo</option>
                <option value="15">15 minutos</option>
                <option value="20">20 minutos</option>
                <option value="25">25 minutos</option>
                <option value="30">30 minutos</option>
            </x-select>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar ejercicio"
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
