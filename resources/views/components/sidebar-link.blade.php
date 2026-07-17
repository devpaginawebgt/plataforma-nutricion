@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
    'disabled' => false,
])

@php
$classes = collect([
    'flex items-center gap-3 px-4 py-3 rounded-default text-sm font-medium transition',
    $active && ! $disabled ? 'bg-primary-600 text-white shadow-sm' : null,
    ! $active && ! $disabled ? 'text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700' : null,
    $disabled ? 'text-gray-400 dark:text-gray-500 cursor-not-allowed' : null,
])->filter()->implode(' ');
@endphp

<a
    href="{{ $disabled ? '#' : $href }}"
    @if($disabled) aria-disabled="true" tabindex="-1" @endif
    class="{{ $classes }}"
>
    @if($icon)
        <span class="icon-[lucide--{{ $icon }}] w-5 h-5 shrink-0"></span>
    @endif
    <span class="flex-1">{{ $slot }}</span>
    @if($disabled)
        <span class="text-2xs uppercase tracking-wider text-gray-500 dark:text-gray-400">soon</span>
    @endif
</a>
