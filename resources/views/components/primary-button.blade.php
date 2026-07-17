<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-button text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 transition']) }}>
    {{ $slot }}
</button>
