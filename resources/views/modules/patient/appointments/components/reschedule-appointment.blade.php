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
            <div class="flex items-start gap-3 min-w-0">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-card bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300">
                    <span class="icon-[lucide--calendar-clock] w-5 h-5"></span>
                </div>
                <div class="min-w-0">
                    <h3 class="text-base font-semibold text-strong leading-snug">Reagendar cita</h3>
                    <p class="text-xs text-muted mt-0.5">Elige la nueva fecha y hora para tu consulta.</p>
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
        <div class="rounded-default bg-primary-50/60 dark:bg-primary-900/20 border-card px-4 py-3 space-y-1">
            <p class="text-2xs font-semibold uppercase tracking-wide text-muted">Cita seleccionada</p>
            <p class="text-sm font-semibold text-strong" data-field="nutritionist">—</p>
            <p class="text-xs text-body" data-field="title">—</p>
        </div>

        {{-- Fecha + hora --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <x-input-label for="{{ $id }}-date" value="Fecha" />
                <x-text-input
                    id="{{ $id }}-date"
                    name="date"
                    type="date"
                    class="mt-1 w-full bg-white dark:bg-gray-800"
                    data-field-input="date"
                />
            </div>
            <div>
                <x-input-label for="{{ $id }}-time" value="Hora" />
                <x-text-input
                    id="{{ $id }}-time"
                    name="time"
                    type="time"
                    class="mt-1 w-full bg-white dark:bg-gray-800"
                    data-field-input="time"
                />
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

        $(document).on('click', '[data-modal-toggle="' + modalId + '"]', function () {
            const $trigger = $(this);
            $modal.find('[data-field="nutritionist"]').text($trigger.data('nutritionist') || '—');
            $modal.find('[data-field="title"]').text($trigger.data('title') || '—');
            $modal.find('[data-field-input="date"]').val($trigger.data('date') || '');
            $modal.find('[data-field-input="time"]').val($trigger.data('time') || '');
        });
    });
</script>
