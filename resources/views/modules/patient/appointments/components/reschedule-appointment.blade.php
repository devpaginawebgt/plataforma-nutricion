@props([
    'id' => 'reschedule-appointment-modal',
])

{{-- Modal para reagendar cita (Flowbite).
     El trigger debe llevar:
       data-modal-target="{{ $id }}"
       data-modal-toggle="{{ $id }}"
       data-nutritionist="..."  data-title="..."  data-date="YYYY-MM-DD"  data-time="HH:MM" --}}
<x-modal name="{{ $id }}" maxWidth="md">
    <form class="p-6 space-y-5" data-reschedule-form>
        <div class="flex items-start justify-between gap-3">
            <div class="flex items-center gap-3 min-w-0">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                    <span class="icon-[lucide--calendar-clock] w-5 h-5"></span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-base font-semibold text-strong leading-snug">Reagendar cita</h3>
                </div>
            </div>

            <button
                type="button"
                data-modal-hide="{{ $id }}"
                class="inline-flex items-center justify-center w-8 h-8 text-muted bg-transparent rounded-input hover:bg-gray-100 hover:text-strong dark:hover:bg-gray-700"
            >
                <span class="icon-[lucide--x] w-4 h-4"></span>
                <span class="sr-only">Cerrar modal</span>
            </button>
        </div>

        {{-- Detalle de la cita --}}
        <div class="rounded-default bg-primary-50/60 dark:bg-primary-900/20 border-card px-4 py-3 space-y-1.5">
            <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Cita seleccionada</p>
            <p class="text-sm font-semibold text-strong" data-field="nutritionist">—</p>
            <p class="text-xs text-body" data-field="title">—</p>
            <div class="flex flex-wrap gap-x-4 gap-y-1 pt-0.5">
                <p class="text-xs text-muted inline-flex items-center gap-1">
                    <span class="icon-[lucide--calendar] w-3.5 h-3.5"></span>
                    <span data-field="datetime">—</span>
                </p>
                <p class="text-xs text-muted inline-flex items-center gap-1">
                    <span class="icon-[lucide--map-pin] w-3.5 h-3.5"></span>
                    <span data-field="modalidad">—</span>
                </p>
            </div>
        </div>

        {{-- Sugerencia de disponibilidad --}}
        <div>
            <p class="text-xs font-semibold text-strong mb-3">Sugiere un día y hora ideal para la cita</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <x-input-label for="{{ $id }}-day" value="Día" />
                    <x-select id="{{ $id }}-day" name="day" class="mt-1 w-full">
                        <option value="" disabled selected>Selecciona un día</option>
                        <option value="martes">Martes</option>
                        <option value="miercoles">Miércoles</option>
                        <option value="jueves">Jueves</option>
                        <option value="viernes">Viernes</option>
                        <option value="sabado">Sábado</option>
                    </x-select>
                </div>
                <div>
                    <x-input-label for="{{ $id }}-time" value="Hora" />
                    <x-select id="{{ $id }}-time" name="time" class="mt-1 w-full">
                        <option value="" disabled selected>Selecciona una hora</option>
                        <option value="08:00">08:00 am</option>
                        <option value="09:00">09:00 am</option>
                        <option value="10:00">10:00 am</option>
                        <option value="11:00">11:00 am</option>
                        <option value="12:00">12:00 pm</option>
                        <option value="14:00">2:00 pm</option>
                        <option value="15:00">3:00 pm</option>
                        <option value="16:00">4:00 pm</option>
                        <option value="17:00">5:00 pm</option>
                    </x-select>
                </div>
            </div>
        </div>

        {{-- Acciones --}}
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-muted">
            <x-button
                type="button"
                variant="soft"
                color="secondary"
                label="Cancelar"
                data-modal-hide="{{ $id }}"
            />
            <x-button
                type="submit"
                color="primary"
                icon="check"
                label="Reagendar"
            />
        </div>
    </form>
</x-modal>

<script type="module">
    $(function () {
        const modalId = @json($id);
        const $modal = $('#' + modalId);
        if (!$modal.length) return;

        const saturdayHours = ['08:00', '09:00', '10:00', '11:00'];

        $modal.on('change', '#{{ $id }}-day', function () {
            const isSaturday = $(this).val() === 'sabado';
            $modal.find('#{{ $id }}-time option[value]').each(function () {
                const val = $(this).val();
                if (!val) { return; }
                $(this).toggle(!isSaturday || saturdayHours.includes(val));
            });
            const $time = $modal.find('#{{ $id }}-time');
            if (isSaturday && !saturdayHours.includes($time.val())) {
                $time.val('');
            }
        });

        $(document).on('click', '[data-modal-toggle="' + modalId + '"]', function () {
            const $trigger = $(this);
            $modal.find('[data-field="nutritionist"]').text($trigger.data('nutritionist') || '—');
            $modal.find('[data-field="title"]').text($trigger.data('title') || '—');
            $modal.find('[data-field="modalidad"]').text($trigger.data('modalidad') || '—');
            $modal.find('[data-field="datetime"]').text($trigger.data('datetime') || '—');

            $modal.find('#{{ $id }}-day').val('').trigger('change');
        });
    });
</script>
