@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-800'])

@php
$dropdownId = 'dropdown-' . \Illuminate\Support\Str::random(10);

$placement = match ($align) {
    'left' => 'bottom-start',
    'top' => 'top',
    default => 'bottom-end',
};

$width = match ($width) {
    '48' => 'w-48',
    default => $width,
};
@endphp

<div class="relative inline-block">
    <div data-dropdown-toggle="{{ $dropdownId }}" data-dropdown-placement="{{ $placement }}" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div id="{{ $dropdownId }}" class="z-50 hidden {{ $width }} rounded-default shadow-lg">
        <div class="rounded-default ring-1 ring-black/5 dark:ring-white/10 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
