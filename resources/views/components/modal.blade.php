@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
    id="{{ $name }}"
    tabindex="-1"
    aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-start w-full md:inset-0 h-modal md:h-full"
>
    <div class="relative w-full {{ $maxWidth }} mx-auto my-8 px-4">
        <div class="relative bg-white dark:bg-gray-800 rounded-modal shadow-xl">
            {{ $slot }}
        </div>
    </div>
</div>

@if($show)
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('{{ $name }}');
        if (el && typeof Modal !== 'undefined') {
            (new Modal(el)).show();
        }
    });
</script>
@endif
