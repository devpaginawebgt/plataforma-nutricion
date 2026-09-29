@props([
    'id',
    'title',
    'unit'  => '',
    'icon'  => '',
    'items' => [],
])

<div id="{{ $id }}"
     class="fixed top-0 right-0 z-50 h-screen w-80 overflow-y-auto transition-transform translate-x-full bg-surface border-l border-card shadow-xl"
     tabindex="-1"
     aria-labelledby="{{ $id }}-label">

    <div class="flex items-center justify-between px-5 py-4 border-b border-card">
        <div class="flex items-center gap-2">
            @if ($icon)
                <span class="icon-[lucide--{{ $icon }}] w-5 h-5 text-primary-700 dark:text-primary-300"></span>
            @endif
            <h5 id="{{ $id }}-label" class="text-base font-semibold text-strong">{{ $title }}</h5>
        </div>
        <button type="button"
                data-drawer-hide="{{ $id }}"
                aria-controls="{{ $id }}"
                class="rounded-default p-1 text-muted hover:text-strong hover:bg-primary-100 dark:hover:bg-primary-900/30 transition-colors">
            <span class="icon-[lucide--x] w-5 h-5"></span>
        </button>
    </div>

    <div class="p-5">
        @if ($slot->isNotEmpty())
            {{ $slot }}
        @else
            <p class="text-2xs uppercase tracking-widest text-muted mb-4">Historial de cambios</p>

            <div class="space-y-2">
                @forelse ($items as $entry)
                    <div class="flex items-center justify-between rounded-default border-card p-3">
                        <div>
                            <p class="text-xs font-medium text-strong">{{ $entry['date'] }}</p>
                            @if (!empty($entry['note']))
                                <p class="text-2xs text-muted mt-0.5">{{ $entry['note'] }}</p>
                            @endif
                        </div>
                        <p class="text-lg font-bold text-strong shrink-0 ml-4">
                            {{ $entry['value'] }}
                            @if ($unit)
                                <span class="text-xs font-medium text-muted">{{ $unit }}</span>
                            @endif
                        </p>
                    </div>
                @empty
                    <p class="text-sm text-muted text-center py-8">Sin historial registrado.</p>
                @endforelse
            </div>
        @endif
    </div>
</div>
