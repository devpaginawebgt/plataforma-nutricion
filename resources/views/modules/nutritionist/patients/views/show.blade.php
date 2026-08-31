<x-app-layout>
    <x-slot name="header">Paciente / Detalle</x-slot>


    <div class="flex items-center justify-between gap-4 rounded-default p-4">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-12 h-12 rounded-full bg-primary-700 text-white flex items-center justify-center text-base font-semibold shrink-0">
                ML
            </div>
            <div class="min-w-0">
                <h3 class="text-base font-bold text-strong truncate">María López Estrada</h3>
                <p class="text-sm text-muted">Expediente clínico</p>
            </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('patients.nutrition-plan') }}">
                <x-button
                    variant="solid"
                    color="success"
                    size="sm"
                    icon="external-link"
                    label="Ir al Plan Nutricional"
                    type="div"
                />
            </a>
            <x-button variant="solid" color="success" size="sm" icon="calendar-plus" label="Programar cita" />
        </div>
    </div>

    <div class="text-sm font-medium text-center text-body border-b border-default">
        <ul class="flex flex-wrap -mb-px" id="patientTabs" data-tabs-toggle="#patientTabContent"
            data-tabs-active-classes="text-primary-700 hover:text-primary-700 border-primary-700"
            data-tabs-inactive-classes="border-transparent text-body hover:text-primary-700 border-soft hover:border-primary-700"
            role="tablist">
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">Información Personal</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Historial Clinico</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Evaluación Nutricional</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false">Plan Nutricional</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="seguimiento-tab" data-tabs-target="#seguimiento" type="button" role="tab" aria-controls="seguimiento"
                    aria-selected="false">Seguimiento</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b border-transparent rounded-t-base"
                    id="citas-tab" data-tabs-target="#citas" type="button" role="tab" aria-controls="citas"
                    aria-selected="false">Citas</button>
            </li>
        </ul>
    </div>

    <div id="patientTabContent">
        <div class="hidden py-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <x-nutritionist-patients::personal-information />
        </div>
        <div class="hidden py-4" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <x-nutritionist-patients::medical-history />
        </div>
        <div class="hidden py-4" id="settings" role="tabpanel" aria-labelledby="settings-tab">
            <x-nutritionist-patients::nutritional-assessment />
        </div>
        <div class="hidden py-4" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
            <x-shared::nutrition-plan />
        </div>
        <div class="hidden py-4" id="seguimiento" role="tabpanel" aria-labelledby="seguimiento-tab">
            <x-nutritionist-patients::follow-up />
        </div>
        <div class="hidden py-4" id="citas" role="tabpanel" aria-labelledby="citas-tab">
            <x-nutritionist-patients::appointments />
        </div>
    </div>



</x-app-layout>