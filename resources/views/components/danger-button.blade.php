<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-button text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 transition']) }}>
    {{ $slot }}
</button>
