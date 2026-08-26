@props([
    'id' => 'new-patient-drawer',
])

{{-- Drawer (Flowbite) — se abre desde la derecha.
     Trigger: <button data-drawer-target="{{ $id }}" data-drawer-show="{{ $id }}" data-drawer-placement="right" aria-controls="{{ $id }}">...</button> --}}
<div
    id="{{ $id }}"
    class="fixed top-0 right-0 z-50 h-screen w-full max-w-96 sm:max-w-2xl p-6 overflow-y-auto transition-transform translate-x-full bg-surface"
    tabindex="-1"
    aria-labelledby="{{ $id }}-label"
    aria-hidden="true"
    data-drawer-placement="right"
>
    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-6">
        <h5 id="{{ $id }}-label" class="inline-flex items-center gap-2 text-base font-semibold text-strong">
            <span class="icon-[lucide--user-plus] w-5 h-5 text-primary-600 dark:text-primary-400"></span>
            Nuevo paciente
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
    <form class="gap-4 grid grid-cols-1 sm:grid-cols-2">
        {{-- Nombre --}}
        <div>
            <x-input-label for="{{ $id }}-first-name">
                Nombres <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input
                id="{{ $id }}-first-name"
                name="first_name"
                type="text"
                required
                placeholder="Ej. María"
                class="mt-1"
            />
        </div>

        {{-- Apellido --}}
        <div>
            <x-input-label for="{{ $id }}-last-name">
                Apellidos <span class="text-red-500">*</span>
            </x-input-label>
            <x-text-input
                id="{{ $id }}-last-name"
                name="last_name"
                type="text"
                required
                placeholder="Ej. López"
                class="mt-1"
            />
        </div>

        {{-- Teléfono --}}
        <div>
            <x-input-label for="{{ $id }}-phone">
                Teléfono <span class="text-red-500">*</span>
            </x-input-label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--phone] w-4 h-4"></span>
                </div>
                <x-text-input
                    id="{{ $id }}-phone"
                    name="phone"
                    type="tel"
                    required
                    placeholder="Ej. 5555 1234"
                    class="ps-10"
                />
            </div>
        </div>

        {{-- Correo electrónico --}}
        <div>
            <x-input-label for="{{ $id }}-email" value="Correo electrónico" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--mail] w-4 h-4"></span>
                </div>
                <x-text-input
                    id="{{ $id }}-email"
                    name="email"
                    type="email"
                    placeholder="paciente@correo.com"
                    class="ps-10"
                />
            </div>
        </div>

        {{-- Género --}}
        <div>
            <x-input-label for="{{ $id }}-gender">
                Género <span class="text-red-500">*</span>
            </x-input-label>
            <x-select id="{{ $id }}-gender" name="gender" required class="mt-1 bg-gray-50 dark:bg-gray-700">
                <option value="">Seleccionar...</option>
                <option value="female">Femenino</option>
                <option value="male">Masculino</option>
                <option value="other">Otro</option>
            </x-select>
        </div>

        {{-- Fecha de nacimiento --}}
        <div>
            <x-input-label for="{{ $id }}-birth-date" value="Fecha de nacimiento" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--calendar] w-4 h-4"></span>
                </div>
                <x-text-input
                    id="{{ $id }}-birth-date"
                    name="birth_date"
                    type="date"
                    class="ps-10"
                />
            </div>
        </div>

        {{-- Departamento --}}
        <div>
            <x-input-label for="{{ $id }}-division">
                Departamento
            </x-input-label>
            <x-select id="{{ $id }}-division" name="division" class="mt-1 bg-gray-50 dark:bg-gray-700">
                <option value="">Seleccionar...</option>
                @php
                    $divisions = \App\Models\Division::all();
                @endphp

                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name}}</option>
                @endforeach
            </x-select>
        </div>

        {{-- Zona --}}
        <div>
            <x-input-label for="{{ $id }}-zone" value="Zona de domicilio" />
            <x-text-input
                id="{{ $id }}-zone"
                name="zone"
                type="text"
                placeholder="Zona 5, Ciudad de Guatemala"
                class="mt-1"
                maxlength="40"
            />
        </div>

        {{-- Ocupación --}}
        <div>
            <x-input-label for="{{ $id }}-occupation" value="Ocupación" />
            <x-text-input
                id="{{ $id }}-occupation"
                name="occupation"
                type="text"
                placeholder="Ej. Docente"
                class="mt-1"
                maxlength="32"
            />
        </div>

        {{-- Contraseña --}}
        <div>
            <x-input-label for="{{ $id }}-password" value="Contraseña" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 inset-s-0 flex items-center ps-3 pointer-events-none text-muted">
                    <span class="icon-[lucide--lock] w-4 h-4"></span>
                </div>
                <x-text-input
                    id="{{ $id }}-password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    placeholder="Mínimo 4 caracteres"
                    class="ps-10"
                />
            </div>
            <p class="text-xs text-muted mt-1">
                El paciente usará esta contraseña para ingresar por primera vez.
            </p>
        </div>

        {{-- Notas --}}
        <div class="col-span-2">
            <x-input-label for="{{ $id }}-notes" value="Notas" />
            <textarea
                id="{{ $id }}-notes"
                name="notes"
                rows="4"
                placeholder="Cualquier información adicional relevante..."
                class="mt-1 block w-full p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            ></textarea>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center gap-3 pt-5 mt-6 border-t border-muted">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar paciente"
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
