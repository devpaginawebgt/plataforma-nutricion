@php
$pacientes = [
    ['id' => 1, 'nombre' => 'Ana Morales',     'edad' => 34, 'diagnostico' => 'Hipertensión arterial',           'ultima_cita' => '05/07/2026', 'proxima_cita' => '22/07/2026', 'estado' => 'active'],
    ['id' => 2, 'nombre' => 'Carlos Mendoza',  'edad' => 57, 'diagnostico' => 'Diabetes tipo 2',                 'ultima_cita' => '01/07/2026', 'proxima_cita' => '18/07/2026', 'estado' => 'active'],
    ['id' => 3, 'nombre' => 'Elena Ramírez',   'edad' => 42, 'diagnostico' => 'Migraña crónica',                 'ultima_cita' => '28/06/2026', 'proxima_cita' => '25/07/2026', 'estado' => 'active'],
    ['id' => 4, 'nombre' => 'José Castillo',   'edad' => 29, 'diagnostico' => 'Gastritis',                        'ultima_cita' => '08/07/2026', 'proxima_cita' => '29/07/2026', 'estado' => 'inactive'],
    ['id' => 5, 'nombre' => 'Patricia Flores', 'edad' => 63, 'diagnostico' => 'Artritis reumatoide',              'ultima_cita' => '03/07/2026', 'proxima_cita' => '20/07/2026', 'estado' => 'active'],
    ['id' => 6, 'nombre' => 'Miguel Herrera',  'edad' => 48, 'diagnostico' => 'Dislipidemia',                     'ultima_cita' => '10/07/2026', 'proxima_cita' => '30/07/2026', 'estado' => 'active'],
    ['id' => 7, 'nombre' => 'Sofía Aguilar',   'edad' => 31, 'diagnostico' => 'Síndrome de ovario poliquístico', 'ultima_cita' => '12/07/2026', 'proxima_cita' => '02/08/2026', 'estado' => 'active'],
];
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold text-strong">Pacientes / Listado</h2>
    </x-slot>

    <div class="space-y-6">
        {{-- Encabezado --}}
        <div class="flex items-start justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-strong">Pacientes</h1>
                <p class="text-sm text-muted mt-1">
                    Este es el listado de pacientes registrados en tu consultorio.
                </p>
            </div>
        </div>

        {{-- Tabla --}}
        <div class="shadow-card border-card rounded-default py-2 px-4 bg-surface">
            <table id="patients-table" class="w-full">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Diagnóstico</th>
                        <th>Última cita</th>
                        <th>Próxima cita</th>
                        <th>Estado</th>
                        <th class="no-sort">Acciones</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td class="font-medium">{{ $paciente['nombre'] }}</td>
                            <td>{{ $paciente['edad'] }}</td>
                            <td>{{ $paciente['diagnostico'] }}</td>
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
                                    <x-button variant="soft" color="info" size="sm" icon="eye" iconOnly title="Ver paciente" />
                                    <x-button variant="soft" color="warning" size="sm" icon="pencil" iconOnly title="Editar paciente" />
                                    <x-button variant="soft" color="success" size="sm" icon="calendar-plus" iconOnly title="Agendar cita" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="module">
        $(function () {
            $(() => initDataTable('#patients-table'));
        });
    </script>
</x-app-layout>
