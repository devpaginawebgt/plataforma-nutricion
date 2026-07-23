<header
    id="app-topbar"
    data-scrolled="false"
    class="sticky top-0 z-30 border-b border-transparent transition-all duration-200"
>
    <div class="flex items-center justify-between px-4 md:px-6 py-3">
        <!-- Izquierda: hamburger (mobile) + título -->
        <div class="flex items-center gap-3">
            <button
                id="app-sidebar-toggle"
                type="button"
                class="flex lg:hidden p-2 rounded-default text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 transition"
                aria-label="Toggle sidebar"
                aria-controls="app-sidebar"
                aria-expanded="false"
            >
                <span class="icon-[lucide--menu] w-5 h-5"></span>
            </button>

            @isset($header)
                <h2 class="text-sm sm:text-lg font-semibold text-muted">{{ $header }}</h2>
            @endisset
        </div>

        <!-- Derecha: acciones -->
        <div class="flex items-center gap-1">
            <x-theme-toggle />

            <!-- Menú de usuario -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button type="button" class="ml-1 flex items-center gap-2 p-1 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                        <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                            <span class="text-sm font-semibold text-primary-700 dark:text-primary-300">
                                {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-700">
                        <div class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</div>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                        <span class="icon-[lucide--user] w-4 h-4"></span>
                        {{ __('Perfil') }}
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                            <span class="icon-[lucide--log-out] w-4 h-4"></span>
                            {{ __('Cerrar sesión') }}
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</header>
