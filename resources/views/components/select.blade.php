@props(['disabled' => false])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-input focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:[color-scheme:dark]']) }}>
    {{ $slot }}
</select>
