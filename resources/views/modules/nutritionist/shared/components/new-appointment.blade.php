@props([
    'id' => 'new-appointment-drawer',
])

@php
    // Lista ficticia de pacientes (temporal, hasta conectar con la BD).
    $patients = [
        ['id' => 1, 'name' => 'Fernando Herrera'],
        ['id' => 2, 'name' => 'Lucía Ortega'],
        ['id' => 3, 'name' => 'Andrés Palacios'],
        ['id' => 4, 'name' => 'Marta Villalobos'],
        ['id' => 5, 'name' => 'Ricardo Solís'],
        ['id' => 6, 'name' => 'Camila Reyes'],
    ];
@endphp

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
            <span class="icon-[lucide--calendar-plus] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Agendar nueva cita
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
        {{-- Paciente --}}
        <div>
            <x-input-label for="{{ $id }}-patient" value="Paciente" />
            <x-select id="{{ $id }}-patient" name="patient_id" class="mt-1 bg-gray-50 dark:bg-gray-700">
                <option value="">Selecciona un paciente...</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient['id'] }}">{{ $patient['name'] }}</option>
                @endforeach
            </x-select>
        </div>

        {{-- Título --}}
        <div>
            <x-input-label for="{{ $id }}-motivo" value="Título" />
            <x-text-input
                id="{{ $id }}-motivo"
                name="motivo"
                type="text"
                placeholder="Ej. Control nutricional mensual"
                class="mt-1"
            />
        </div>

        {{-- Modalidad --}}
        <div>
            <x-input-label for="{{ $id }}-modalidad" value="Modalidad" />
            <x-select id="{{ $id }}-modalidad" name="modalidad" class="mt-1 bg-gray-50 dark:bg-gray-700">
                <option value="presencial">Presencial</option>
                <option value="virtual">Virtual</option>
            </x-select>
        </div>

        {{-- Estado --}}
        <div>
            <x-input-label for="{{ $id }}-state" value="Estado" />
            <x-select id="{{ $id }}-state" name="state" class="mt-1 bg-gray-50 dark:bg-gray-700">
                <option value="pending">Pendiente</option>
                <option value="completed">Completada</option>
                <option value="canceled">Cancelada</option>
            </x-select>
        </div>

        {{-- Fecha y hora --}}
        <div>
            <x-input-label for="{{ $id }}-datetime" value="Fecha y hora" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--calendar-clock] w-4 h-4"></span>
                </div>
                <x-text-input
                    id="{{ $id }}-datetime"
                    name="appointment_date"
                    type="datetime-local"
                    class="ps-10"
                />
            </div>
        </div>

        {{-- Observaciones --}}
        <div>
            <x-input-label for="{{ $id }}-notes" value="Observaciones" />
            <textarea
                id="{{ $id }}-notes"
                name="notes"
                rows="4"
                placeholder="Notas adicionales sobre la cita..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar cita"
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
