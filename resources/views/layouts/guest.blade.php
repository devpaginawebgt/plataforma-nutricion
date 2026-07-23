<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script>
            (function () {
                const stored = localStorage.getItem('theme') ?? 'system';
                const isDark = stored === 'dark' || (stored === 'system' && matchMedia('(prefers-color-scheme: dark)').matches);
                document.documentElement.classList.toggle('dark', isDark);
            })();
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-strong">
        <div
            class="min-h-screen flex flex-col items-center justify-center px-4 py-10 bg-cover bg-center bg-no-repeat relative"
            style="background-image: url('{{ asset('images/auth-bg.jpg') }}');"
        >
            {{-- Overlay para legibilidad (más ligero en light, más denso en dark) --}}
            <div class="absolute inset-0 bg-gray-950/30 dark:bg-gray-950/60 backdrop-blur-[2px] dark:backdrop-blur-xs"></div>

            <div class="absolute top-4 right-4 z-10 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-default text-white [&_button]:text-white [&_button:hover]:bg-white/10">
                <x-theme-toggle />
            </div>

            <div class="relative w-full sm:max-w-md">
                <div class="flex flex-col items-center gap-2 mb-6">
                    <a href="/" class="inline-flex items-center justify-center w-14 h-14 rounded-card bg-primary-600 dark:bg-primary-500 shadow-card">
                        <span class="icon-[lucide--salad] w-8 h-8 text-white"></span>
                    </a>
                    <span class="text-xl font-semibold text-white drop-shadow-md">Nutrición</span>
                </div>

                <div class="bg-white/85 dark:bg-gray-900/85 backdrop-blur-md border-card rounded-card shadow-card px-6 py-10 sm:px-10">
                    {{ $slot }}
                </div>

                <p class="text-xs text-white/80 text-center mt-6 drop-shadow">
                    &copy; {{ date('Y') }} Plataforma Nutrición. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </body>
</html>
