<aside
    id="app-sidebar"
    class="fixed top-0 left-0 z-50 h-screen w-64 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 -translate-x-full lg:translate-x-0 transition-transform duration-200"
    aria-label="Sidebar"
>
    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="px-6 py-5 flex items-center gap-4 dark:border-gray-700">
            <x-application-logo class="w-8 h-8 fill-current text-primary-600 dark:text-primary-400" />
            <span class="text-lg font-semibold text-gray-900 dark:text-white">Nutrición</span>
        </div>

        <!-- Usuario -->
        <div class="px-6 py-5 flex flex-col items-center dark:border-gray-700">
            <div class="w-16 h-16 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                <span class="text-2xl font-semibold text-primary-700 dark:text-primary-300">
                    {{ mb_strtoupper(mb_substr(Auth::user()->name, 0, 1)) }}
                </span>
            </div>
            <div class="mt-3 text-center">
                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Nutricionista</div>
            </div>
        </div>

        <!-- Menú -->
        <nav class="flex-1 px-3 py-4 overflow-y-auto space-y-1">
            <x-sidebar-link :href="route('dashboard')" icon="house" :active="request()->routeIs('dashboard')">
                Inicio
            </x-sidebar-link>
            <x-sidebar-link :href="route('patients.index')" icon="users" :active="request()->routeIs('patients.index')">
                Pacientes
            </x-sidebar-link>
            <x-sidebar-link :href="route('appointments.index')" icon="calendar" :active="request()->routeIs('appointments.index')">
                Citas
            </x-sidebar-link>
            <x-sidebar-link :href="route('diets.index')" icon="clipboard-list" :active="request()->routeIs('diets.index')">
                Dietas / Planes
            </x-sidebar-link>
            <x-sidebar-link :href="route('recommendations.index')" icon="lightbulb" :active="request()->routeIs('recommendations.index')">
                Recomendaciones
            </x-sidebar-link>
            <x-sidebar-link :href="route('tracking.index')" icon="activity" :active="request()->routeIs('tracking.index')">
                Seguimiento
            </x-sidebar-link>
            <x-sidebar-link :href="route('reports.index')" icon="file-text" :active="request()->routeIs('reports.index')">
                Reportes
            </x-sidebar-link>
            <x-sidebar-link :href="route('settings.index')" icon="settings" :active="request()->routeIs('settings.index')">
                Configuración
            </x-sidebar-link>
        </nav>
    </div>
</aside>

<!-- Backdrop mobile -->
<div
    id="app-sidebar-backdrop"
    class="fixed inset-0 z-40 bg-gray-900/50 hidden lg:hidden"
    aria-hidden="true"
></div>
