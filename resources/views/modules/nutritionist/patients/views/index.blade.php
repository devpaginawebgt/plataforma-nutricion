@php
$pacientes = [
    ['id' => 1, 'nombre' => 'Ana María',       'apellido' => 'Morales Cruz',      'edad' => 34, 'diagnosticos' => ['Hipertensión arterial', 'Diabetes tipo 2'], 'ultima_cita' => '05/07/2026', 'proxima_cita' => '22/07/2026', 'estado' => 'active'],
    ['id' => 2, 'nombre' => 'Carlos Alberto',  'apellido' => 'Mendoza Rivera',    'edad' => 57, 'diagnosticos' => ['Diabetes tipo 2', 'Dislipidemia'],         'ultima_cita' => '01/07/2026', 'proxima_cita' => '18/07/2026', 'estado' => 'active'],
    ['id' => 3, 'nombre' => 'Elena Beatriz',   'apellido' => 'Ramírez Solís',     'edad' => 42, 'diagnosticos' => ['Migraña crónica'],                         'ultima_cita' => '28/06/2026', 'proxima_cita' => '25/07/2026', 'estado' => 'active'],
    ['id' => 4, 'nombre' => 'José Antonio',    'apellido' => 'Castillo Fuentes',  'edad' => 29, 'diagnosticos' => ['Gastritis', 'Colitis'],                    'ultima_cita' => '08/07/2026', 'proxima_cita' => '29/07/2026', 'estado' => 'inactive'],
    ['id' => 5, 'nombre' => 'Patricia Isabel', 'apellido' => 'Flores Ortega',     'edad' => 63, 'diagnosticos' => ['Artritis reumatoide', 'Osteoporosis'],     'ultima_cita' => '03/07/2026', 'proxima_cita' => '20/07/2026', 'estado' => 'active'],
    ['id' => 6, 'nombre' => 'Miguel Ángel',    'apellido' => 'Herrera Navarro',   'edad' => 48, 'diagnosticos' => ['Dislipidemia'],                            'ultima_cita' => '10/07/2026', 'proxima_cita' => '30/07/2026', 'estado' => 'active'],
    ['id' => 7, 'nombre' => 'Sofía Lucía',     'apellido' => 'Aguilar Vargas',    'edad' => 31, 'diagnosticos' => ['Síndrome de ovario poliquístico'],         'ultima_cita' => '12/07/2026', 'proxima_cita' => '02/08/2026', 'estado' => 'active'],
];
@endphp

<x-app-layout>
    <x-slot name="header">Pacientes / Listado</x-slot>

    <div class="space-y-6">
        {{-- Encabezado --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-strong">Pacientes</h1>
                <p class="text-sm text-muted mt-1">
                    Este es el listado de pacientes registrados en tu consultorio.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <x-button
                    color="primary"
                    icon="plus"
                    size="sm"
                    data-drawer-target="new-patient-drawer"
                    data-drawer-show="new-patient-drawer"
                    data-drawer-placement="right"
                    aria-controls="new-patient-drawer"
                    title="Nuevo paciente"
                >
                    <span class="hidden sm:inline">Nuevo paciente</span>
                </x-button>
                <x-button
                    color="success"
                    size="sm"
                    icon="download"
                    title="Descargar registros filtrados"
                >
                    <span class="hidden sm:inline">Descargar</span>
                </x-button>
                <x-button
                    color="secondary"
                    size="sm"
                    icon="download"
                    title="Descargar todos los pacientes"
                >
                    <span class="hidden md:inline">Descargar todos</span>
                </x-button>
            </div>
        </div>

        {{-- Filtro --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:flex-wrap sm:items-end">
            <div class="w-full sm:w-72">
                <x-input-label for="patients-search" value="Buscar" class="text-xs" />
                <div class="relative mt-1">
                    <span class="icon-[lucide--search] w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-muted pointer-events-none"></span>
                    <x-text-input
                        id="patients-search"
                        type="search"
                        placeholder="Nombre o diagnóstico..."
                        class="block w-full pl-9 text-sm bg-white dark:bg-gray-800"
                    />
                </div>
            </div>

            <div class="w-full sm:w-auto">
                <x-input-label for="patients-state-filter" value="Estado" class="text-xs" />
                <x-select id="patients-state-filter" class="mt-1 min-w-36 bg-white dark:bg-gray-800">
                    <option value="active">Activos</option>
                    <option value="inactive">Inactivos</option>
                </x-select>
            </div>

            <x-button color="primary" icon="filter" iconOnly title="Filtrar" class="mb-1" />
        </div>

        {{-- Tabla --}}
        <div class="shadow-card border-card rounded-default py-2 px-4 bg-surface">
            <table id="patients-table" class="w-full table table-responsive">
                <thead>
                    <tr>
                        <th data-priority="1">Nombre</th>
                        <th data-priority="4">Apellido</th>
                        <th data-priority="8">Edad</th>
                        <th class="no-sort" data-priority="6">Diagnósticos</th>
                        <th data-priority="7">Última cita</th>
                        <th data-priority="5">Próxima cita</th>
                        <th data-priority="3">Estado</th>
                        <th class="no-sort" data-priority="2">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td class="font-medium">{{ $paciente['nombre'] }}</td>
                            <td class="font-medium">{{ $paciente['apellido'] }}</td>
                            <td>{{ $paciente['edad'] }}</td>
                            <td>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($paciente['diagnosticos'] as $diagnostico)
                                        <span class="inline-flex items-center rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 px-3 py-1 text-xs font-medium">{{ $diagnostico }}</span>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{ $paciente['ultima_cita'] }}</td>
                            <td>{{ $paciente['proxima_cita'] }}</td>
                            <td>
                                @if($paciente['estado'] === 'active')
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 dark:bg-green-900/40 px-2.5 py-0.5 text-xs font-medium text-green-700 dark:text-green-300">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-600 dark:bg-green-400"></span>
                                        Activo
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 dark:bg-gray-700 px-2.5 py-0.5 text-xs font-medium text-gray-700 dark:text-gray-300">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-500"></span>
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('patients.show') }}">
                                        <x-button variant="soft" color="info" size="sm" icon="eye" iconOnly title="Ver paciente" />
                                    </a>
                                    <x-button variant="soft" color="warning" size="sm" icon="pencil" iconOnly title="Editar paciente" />
                                    <x-button
                                        variant="soft"
                                        color="success"
                                        size="sm"
                                        icon="calendar-plus"
                                        iconOnly
                                        title="Agendar cita"
                                        data-drawer-target="new-appointment-drawer"
                                        data-drawer-show="new-appointment-drawer"
                                        data-drawer-placement="right"
                                        aria-controls="new-appointment-drawer"
                                    />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-nutritionist-shared::new-appointment id="new-appointment-drawer" />
    <x-nutritionist-shared::new-patient id="new-patient-drawer" />

    <script type="module">
        $(function () {
            initDataTable('#patients-table', {
                layout: {
                    topStart: null,
                    topEnd: null,
                    bottomStart: 'info',
                    bottomEnd: 'paging',
                },
            });
        });
    </script>
</x-app-layout>
