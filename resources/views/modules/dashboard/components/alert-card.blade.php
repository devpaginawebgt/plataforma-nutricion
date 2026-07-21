@props([
    'message',
    'icon' => 'bell',
    'color' => 'red',
])

@php
$bgMap = [
    'red'    => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800/50',
    'yellow' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800/50',
    'blue'   => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800/50',
];
$iconMap = [
    'red'    => 'bg-red-100 text-red-700 dark:bg-red-900/50 dark:text-red-300',
    'yellow' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/50 dark:text-yellow-300',
    'blue'   => 'bg-blue-100 text-blue-700 dark:bg-blue-900/50 dark:text-blue-300',
];
@endphp

<div class="rounded-default p-4 border {{ $bgMap[$color] ?? $bgMap['red'] }} flex items-center gap-3">
    <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 {{ $iconMap[$color] ?? $iconMap['red'] }}">
        <span class="icon-[lucide--{{ $icon }}] w-5 h-5"></span>
    </div>
    <div class="text-sm text-gray-800 dark:text-gray-200">{{ $message }}</div>
</div>
