@php
$pacientes = [
    ['id' => 1, 'nombre' => 'Ana María',       'apellido' => 'Morales Cruz',      'edad' => 34, 'diagnostico' => 'Hipertensión arterial',           'ultima_cita' => '05/07/2026', 'proxima_cita' => '22/07/2026', 'estado' => 'active'],
    ['id' => 2, 'nombre' => 'Carlos Alberto',  'apellido' => 'Mendoza Rivera',    'edad' => 57, 'diagnostico' => 'Diabetes tipo 2',                 'ultima_cita' => '01/07/2026', 'proxima_cita' => '18/07/2026', 'estado' => 'active'],
    ['id' => 3, 'nombre' => 'Elena Beatriz',   'apellido' => 'Ramírez Solís',     'edad' => 42, 'diagnostico' => 'Migraña crónica',                 'ultima_cita' => '28/06/2026', 'proxima_cita' => '25/07/2026', 'estado' => 'active'],
    ['id' => 4, 'nombre' => 'José Antonio',    'apellido' => 'Castillo Fuentes',  'edad' => 29, 'diagnostico' => 'Gastritis',                       'ultima_cita' => '08/07/2026', 'proxima_cita' => '29/07/2026', 'estado' => 'inactive'],
    ['id' => 5, 'nombre' => 'Patricia Isabel', 'apellido' => 'Flores Ortega',     'edad' => 63, 'diagnostico' => 'Artritis reumatoide',             'ultima_cita' => '03/07/2026', 'proxima_cita' => '20/07/2026', 'estado' => 'active'],
    ['id' => 6, 'nombre' => 'Miguel Ángel',    'apellido' => 'Herrera Navarro',   'edad' => 48, 'diagnostico' => 'Dislipidemia',                    'ultima_cita' => '10/07/2026', 'proxima_cita' => '30/07/2026', 'estado' => 'active'],
    ['id' => 7, 'nombre' => 'Sofía Lucía',     'apellido' => 'Aguilar Vargas',    'edad' => 31, 'diagnostico' => 'Síndrome de ovario poliquístico', 'ultima_cita' => '12/07/2026', 'proxima_cita' => '02/08/2026', 'estado' => 'active'],
];
@endphp

<x-app-layout>
    <x-slot name="header">Pacientes / Listado</x-slot>

    <div class="space-y-6">
        {{-- Encabezado --}}
        <div class="flex items-end justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-strong">Pacientes</h1>
                <p class="text-sm text-muted mt-1">
                    Este es el listado de pacientes registrados en tu consultorio.
                </p>
            </div>

            <div class="flex gap-2">
                <x-button
                    color="primary"
                    icon="plus"
                    size="sm"
                    label="Nuevo paciente"
                    data-drawer-target="new-patient-drawer"
                    data-drawer-show="new-patient-drawer"
                    data-drawer-placement="right"
                    aria-controls="new-patient-drawer"
                />
                <x-button
                    color="success"
                    size="sm"
                    icon="download"
                    iconOnly
                    title="Descargar pacientes"
                />
            </div>
        </div>

        {{-- Tabla --}}
        <div class="shadow-card border-card rounded-default py-2 px-4 bg-surface">
            <table id="patients-table" class="w-full">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
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
                            <td class="font-medium">{{ $paciente['apellido'] }}</td>
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
            $(() => initDataTable('#patients-table'));
        });
    </script>
</x-app-layout>
