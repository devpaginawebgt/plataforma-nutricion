@props([
    'label',
    'value',
    'icon' => 'circle',
    'color' => 'primary',
])

@php
$colorMap = [
    'primary' => 'bg-primary-100 text-primary-700 dark:bg-primary-900/50 dark:text-primary-300',
    'blue'    => 'bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300',
    'orange'  => 'bg-orange-100 text-orange-700 dark:bg-orange-900/50 dark:text-orange-300',
    'purple'  => 'bg-purple-100 text-purple-700 dark:bg-purple-900/50 dark:text-purple-300',
];
$iconClasses = $colorMap[$color] ?? $colorMap['primary'];
@endphp

<div class="bg-surface rounded-default p-5 shadow-card border-card flex items-center gap-4">
    <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 {{ $iconClasses }}">
        <span class="icon-[lucide--{{ $icon }}] w-6 h-6"></span>
    </div>
    <div>
        <div class="text-2xl font-bold text-strong">{{ $value }}</div>
        <div class="text-sm text-muted">{{ $label }}</div>
    </div>
</div>