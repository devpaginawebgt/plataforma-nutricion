@props([
    'label' => 'Peso',
    'value' => '—',
    'unit' => 'kg',
    'date' => null,
    'icon' => 'scale',
    'color' => 'primary',
])

@php
    $palette = [
        'primary' => 'bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300',
        'blue'    => 'bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300',
        'green'   => 'bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300',
    ][$color] ?? 'bg-primary-100 text-primary-700 dark:bg-primary-900/40 dark:text-primary-300';
@endphp

<div class="bg-surface rounded-default p-5 shadow-card border-card flex items-center gap-4">
    <div class="w-12 h-12 rounded-default flex items-center justify-center shrink-0 {{ $palette }}">
        <span class="icon-[lucide--{{ $icon }}] w-6 h-6"></span>
    </div>
    <div class="min-w-0">
        <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">{{ $label }}</p>
        <p class="text-2xl font-bold text-strong leading-tight">
            {{ $value }} <span class="text-sm font-medium text-muted">{{ $unit }}</span>
        </p>
        @if ($date)
            <p class="text-xs text-muted mt-0.5 flex items-center gap-1">
                <span class="icon-[lucide--calendar] w-3.5 h-3.5"></span>
                {{ $date }}
            </p>
        @endif
    </div>
</div>
