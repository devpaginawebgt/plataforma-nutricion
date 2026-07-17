<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 text-gray-900 dark:text-gray-100">
        {{ __("You're logged in!") }}
    </div>
</x-app-layout>
