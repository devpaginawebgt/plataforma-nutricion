@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

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

    <div id="{{ $dropdownId }}" class="z-50 hidden {{ $width }} rounded-md shadow-lg">
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
