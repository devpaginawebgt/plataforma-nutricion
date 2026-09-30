@php
$days = [
    ['key' => 'monday',    'label' => 'Lunes',      'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00']],
    ['key' => 'tuesday',   'label' => 'Martes',     'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00']],
    ['key' => 'wednesday', 'label' => 'Miércoles',  'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00']],
    ['key' => 'thursday',  'label' => 'Jueves',     'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00']],
    ['key' => 'friday',    'label' => 'Viernes',    'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00']],
    ['key' => 'saturday',  'label' => 'Sábado',     'available' => true,  'slots' => ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'], 'active' => ['08:00','09:00','10:00','11:00']],
];
@endphp

<x-app-layout>
    <x-slot name="header">Configuración / Disponibilidad</x-slot>

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-xl font-bold text-strong sm:text-2xl">Horarios de disponibilidad</h1>
        <p class="text-sm text-muted mt-1">
            Define los días y horas en que estás disponible para atender citas.
        </p>
    </div>

    <form method="POST" action="#" id="availability-form">
        @csrf

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($days as $day)
                <div
                    class="rounded-card border-card bg-surface shadow-card flex flex-col gap-4 p-4"
                    data-day-card="{{ $day['key'] }}"
                >
                    {{-- Encabezado del día + toggle --}}
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-strong">{{ $day['label'] }}</span>

                        <label class="inline-flex cursor-pointer items-center gap-2">
                            <span class="text-xs text-muted" data-toggle-label="{{ $day['key'] }}">
                                {{ $day['available'] ? 'Activo' : 'Inactivo' }}
                            </span>
                            <div class="relative">
                                <input
                                    type="checkbox"
                                    name="schedule[{{ $day['key'] }}][available]"
                                    value="1"
                                    class="peer sr-only"
                                    data-day-toggle="{{ $day['key'] }}"
                                    {{ $day['available'] ? 'checked' : '' }}
                                >
                                <div class="h-5 w-9 rounded-full bg-gray-300 dark:bg-gray-600 transition-colors peer-checked:bg-primary-600 dark:peer-checked:bg-primary-500 peer-focus:ring-2 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800"></div>
                                <div class="peer-checked:translate-x-4 absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white shadow transition-transform"></div>
                            </div>
                        </label>
                    </div>

                    {{-- Slots de horas --}}
                    <div
                        class="grid grid-cols-2 gap-2 transition-opacity duration-200"
                        data-slots-container="{{ $day['key'] }}"
                        @if(! $day['available']) style="opacity:0.35;pointer-events:none;" @endif
                    >
                        @foreach ($day['slots'] as $slot)
                            @php $checked = in_array($slot, $day['active']); @endphp
                            <label
                                class="flex cursor-pointer items-center justify-center gap-1.5 rounded-input border px-2 py-1.5 text-xs font-medium transition-colors
                                    {{ $checked
                                        ? 'border-primary-400 bg-primary-50 text-primary-700 dark:border-primary-600 dark:bg-primary-900/30 dark:text-primary-300'
                                        : 'border-gray-200 bg-white text-body hover:border-primary-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:border-primary-700' }}"
                                data-slot-label
                            >
                                <input
                                    type="checkbox"
                                    name="schedule[{{ $day['key'] }}][slots][]"
                                    value="{{ $slot }}"
                                    class="sr-only"
                                    {{ $checked ? 'checked' : '' }}
                                >
                                <span class="icon-[lucide--clock] w-3 h-3"></span>
                                {{ date('g:i a', strtotime($slot)) }}
                            </label>
                        @endforeach
                    </div>

                    {{-- Mensaje cuando está inactivo --}}
                    <p
                        class="text-xs text-muted text-center"
                        data-inactive-msg="{{ $day['key'] }}"
                        @if($day['available']) style="display:none;" @endif
                    >
                        No disponible este día
                    </p>
                </div>
            @endforeach
        </div>

        {{-- Acciones --}}
        <div class="mt-6 flex justify-end">
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Guardar cambios"
            />
        </div>
    </form>

    <script type="module">
        $(function () {
            $('[data-day-toggle]').on('change', function () {
                const day      = $(this).data('day-toggle');
                const isActive = $(this).is(':checked');

                $('[data-toggle-label="' + day + '"]').text(isActive ? 'Activo' : 'Inactivo');

                if (isActive) {
                    $('[data-slots-container="' + day + '"]').css({ opacity: '1', 'pointer-events': 'auto' });
                    $('[data-inactive-msg="' + day + '"]').hide();
                } else {
                    $('[data-slots-container="' + day + '"]').css({ opacity: '0.35', 'pointer-events': 'none' });
                    $('[data-inactive-msg="' + day + '"]').show();
                }
            });

            $(document).on('change', '[data-slot-label] input[type="checkbox"]', function () {
                const $lbl = $(this).closest('[data-slot-label]');
                if ($(this).is(':checked')) {
                    $lbl.removeClass('border-gray-200 bg-white text-body hover:border-primary-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:border-primary-700')
                        .addClass('border-primary-400 bg-primary-50 text-primary-700 dark:border-primary-600 dark:bg-primary-900/30 dark:text-primary-300');
                } else {
                    $lbl.removeClass('border-primary-400 bg-primary-50 text-primary-700 dark:border-primary-600 dark:bg-primary-900/30 dark:text-primary-300')
                        .addClass('border-gray-200 bg-white text-body hover:border-primary-300 dark:border-gray-600 dark:bg-gray-800 dark:hover:border-primary-700');
                }
            });
        });
    </script>
</x-app-layout>
