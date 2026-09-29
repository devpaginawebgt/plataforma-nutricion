@props([
    'id' => 'new-resource-drawer',
])

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
            <span class="icon-[lucide--zap] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Nuevo recurso
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
        {{-- Tipo --}}
        <div>
            <x-input-label for="{{ $id }}-type" value="Tipo" />
            <x-select id="{{ $id }}-type" name="type" class="mt-1">
                <option value="" disabled selected>Selecciona el tipo</option>
                <option value="video">Video</option>
                <option value="pdf">PDF</option>
            </x-select>
        </div>

        {{-- Tema --}}
        <div>
            <x-input-label for="{{ $id }}-topic" value="Tema" />
            <x-select id="{{ $id }}-topic" name="topic" class="mt-1">
                <option value="" disabled selected>Selecciona un tema</option>
                <option value="bienvenida">Bienvenida</option>
                <option value="alimentacion">Alimentación</option>
                <option value="sueno">Sueño</option>
                <option value="salud">Salud</option>
                <option value="motivacion">Motivación</option>
            </x-select>
        </div>

        {{-- Título --}}
        <div>
            <x-input-label for="{{ $id }}-title" value="Título" />
            <x-text-input
                id="{{ $id }}-title"
                name="title"
                type="text"
                maxlength="80"
                placeholder="Ej: Guía para mejorar tu sueño"
                class="mt-1"
            />
            <p class="mt-1 text-2xs text-muted">Máximo 80 caracteres.</p>
        </div>

        {{-- Descripción --}}
        <div>
            <x-input-label for="{{ $id }}-description" value="Descripción" />
            <textarea
                id="{{ $id }}-description"
                name="description"
                rows="3"
                maxlength="300"
                placeholder="Breve descripción del recurso..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
            <p class="mt-1 text-2xs text-muted">Máximo 300 caracteres.</p>
        </div>

        {{-- Link (video) --}}
        <div>
            <x-input-label for="{{ $id }}-link" value="Link del video" />
            <x-text-input
                id="{{ $id }}-link"
                name="link"
                type="url"
                maxlength="255"
                placeholder="https://..."
                class="mt-1"
            />
        </div>

        {{-- Duración (video) --}}
        <div>
            <x-input-label for="{{ $id }}-duration" value="Duración" />
            <x-text-input
                id="{{ $id }}-duration"
                name="duration"
                type="text"
                maxlength="20"
                placeholder="Ej: 15 minutos"
                class="mt-1"
            />
        </div>

        {{-- Páginas (PDF) --}}
        {{-- <div>
            <x-input-label for="{{ $id }}-pages" value="Páginas" />
            <x-text-input
                id="{{ $id }}-pages"
                name="pages"
                type="number"
                min="1"
                placeholder="Ej: 12"
                class="mt-1"
            />
        </div> --}}

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar recurso"
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
