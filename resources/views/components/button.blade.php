@props([
    'color' => 'primary',      // primary | secondary | success | danger | warning | info | dark
    'variant' => 'solid',      // solid | soft | outline | ghost
    'size' => 'md',            // sm | md | lg
    'icon' => null,            // icono Lucide leading (izquierda)
    'trailingIcon' => null,    // icono Lucide trailing (derecha)
    'label' => null,           // texto del botón (alternativa al slot)
    'iconOnly' => false,       // botón cuadrado solo con icono (usa 'icon')
    'type' => 'button',
])

@php
$styles = [
    'solid' => [
        'primary'   => 'text-white bg-primary-700 hover:brightness-110 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:focus:ring-primary-800',
        'secondary' => 'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
        'success'   => 'text-white bg-success hover:brightness-110 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800',
        'danger'    => 'text-white bg-danger hover:brightness-110 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800',
        'warning'   => 'text-white bg-warning hover:brightness-110 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800',
        'info'      => 'text-white bg-blue-700 hover:brightness-110 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:focus:ring-blue-800',
        'dark'      => 'text-white bg-dark hover:brightness-110 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700',
    ],
    'soft' => [
        'primary'   => 'bg-primary-100 text-primary-700 hover:bg-primary-200 focus:ring-4 focus:ring-primary-200 dark:bg-primary-900/40 dark:text-primary-300 dark:hover:bg-primary-900/60 dark:focus:ring-primary-800',
        'secondary' => 'bg-gray-100 text-gray-800 hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 dark:focus:ring-gray-600',
        'success'   => 'bg-green-100 text-green-700 hover:bg-green-200 focus:ring-4 focus:ring-green-200 dark:bg-green-900/40 dark:text-green-300 dark:hover:bg-green-900/60 dark:focus:ring-green-800',
        'danger'    => 'bg-red-100 text-red-700 hover:bg-red-200 focus:ring-4 focus:ring-red-200 dark:bg-red-900/40 dark:text-red-300 dark:hover:bg-red-900/60 dark:focus:ring-red-900',
        'warning'   => 'bg-orange-100 text-orange-700 hover:bg-orange-200 focus:ring-4 focus:ring-orange-200 dark:bg-orange-900/40 dark:text-orange-300 dark:hover:bg-orange-900/60 dark:focus:ring-orange-800',
        'info'      => 'bg-blue-100 text-blue-700 hover:bg-blue-200 focus:ring-4 focus:ring-blue-200 dark:bg-blue-900/40 dark:text-blue-300 dark:hover:bg-blue-900/60 dark:focus:ring-blue-800',
        'dark'      => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-4 focus:ring-gray-200 dark:bg-gray-700 dark:text-gray-100 dark:hover:bg-gray-600 dark:focus:ring-gray-600',
    ],
    'outline' => [
        'primary'   => 'text-primary-700 border border-primary-700 hover:bg-primary-700 hover:text-white focus:ring-4 focus:ring-primary-300 dark:text-primary-400 dark:border-primary-400 dark:hover:bg-primary-600 dark:hover:text-white dark:focus:ring-primary-800',
        'secondary' => 'text-gray-700 border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
        'success'   => 'text-green-700 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:ring-green-300 dark:text-green-400 dark:border-green-400 dark:hover:bg-green-600 dark:hover:text-white dark:focus:ring-green-800',
        'danger'    => 'text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:ring-red-300 dark:text-red-400 dark:border-red-400 dark:hover:bg-red-600 dark:hover:text-white dark:focus:ring-red-900',
        'warning'   => 'text-orange-600 border border-orange-500 hover:bg-orange-500 hover:text-white focus:ring-4 focus:ring-orange-300 dark:text-orange-400 dark:border-orange-400 dark:hover:bg-orange-500 dark:hover:text-white dark:focus:ring-orange-800',
        'info'      => 'text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:ring-blue-300 dark:text-blue-400 dark:border-blue-400 dark:hover:bg-blue-600 dark:hover:text-white dark:focus:ring-blue-800',
        'dark'      => 'text-gray-900 border border-gray-800 hover:bg-gray-800 hover:text-white focus:ring-4 focus:ring-gray-300 dark:text-gray-200 dark:border-gray-500 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700',
    ],
    'ghost' => [
        'primary'   => 'text-primary-700 hover:bg-primary-100 focus:ring-4 focus:ring-primary-200 dark:text-primary-300 dark:hover:bg-primary-900/40 dark:focus:ring-primary-800',
        'secondary' => 'text-gray-700 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
        'success'   => 'text-green-700 hover:bg-green-100 focus:ring-4 focus:ring-green-200 dark:text-green-300 dark:hover:bg-green-900/40 dark:focus:ring-green-800',
        'danger'    => 'text-red-700 hover:bg-red-100 focus:ring-4 focus:ring-red-200 dark:text-red-300 dark:hover:bg-red-900/40 dark:focus:ring-red-900',
        'warning'   => 'text-orange-700 hover:bg-orange-100 focus:ring-4 focus:ring-orange-200 dark:text-orange-300 dark:hover:bg-orange-900/40 dark:focus:ring-orange-800',
        'info'      => 'text-blue-700 hover:bg-blue-100 focus:ring-4 focus:ring-blue-200 dark:text-blue-300 dark:hover:bg-blue-900/40 dark:focus:ring-blue-800',
        'dark'      => 'text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-700',
    ],
];

$sizes = [
    'sm' => $iconOnly ? 'p-1.5' : 'text-xs px-3 py-2 gap-1.5',
    'md' => $iconOnly ? 'p-2.5' : 'text-sm px-4 py-2.5 gap-2',
];

$iconSizes = [
    'sm' => 'w-3.5 h-3.5',
    'md' => 'w-4 h-4',
    'lg' => 'w-5 h-5',
];

$variantMap = $styles[$variant] ?? $styles['solid'];
$colorClasses = $variantMap[$color] ?? $variantMap['primary'];

$classes = trim(implode(' ', [
    'inline-flex items-center justify-center font-medium rounded-button focus:outline-none transition',
    $colorClasses,
    $sizes[$size] ?? $sizes['md'],
]));

$iconClass = $iconSizes[$size] ?? $iconSizes['md'];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="icon-[lucide--{{ $icon }}] {{ $iconClass }} shrink-0"></span>
    @endif

    @if(! $iconOnly)
        @if($label !== null)
            <span>{{ $label }}</span>
        @else
            {{ $slot }}
        @endif
    @endif

    @if($trailingIcon && ! $iconOnly)
        <span class="icon-[lucide--{{ $trailingIcon }}] {{ $iconClass }} shrink-0"></span>
    @endif
</button>
