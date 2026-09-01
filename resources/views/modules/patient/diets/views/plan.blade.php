<x-app-layout>
    <x-slot name="header">Mi plan nutricional / Detalle</x-slot>

    <div class="mb-4 flex flex-col md:flex-row items-center justify-center text-center md:text-start md:items-start md:justify-between gap-3">
        <div>
            <h1 class="text-2xl font-bold text-strong">Mi plan nutricional</h1>
            <p class="text-sm text-muted mt-1">
                Explora cada sección del plan que definió tu nutricionista.
            </p>
        </div>

        <a href="{{ route('patient.diets.index') }}">
            <x-button
                variant="soft"
                color="secondary"
                size="sm"
                icon="arrow-left"
                label="Volver al menú"
                type="div"
            />
        </a>
    </div>

    @php
        $planTabs = [
            ['id' => 'bienvenida',     'label' => 'Página de bienvenida'],
            ['id' => 'antropometrico', 'label' => 'Datos antropométricos'],
            ['id' => 'diagnosis',      'label' => 'Diagnóstico y metas'],
            ['id' => 'portions',       'label' => 'Porciones'],
            ['id' => 'menu',           'label' => 'Menú nutricional'],
            ['id' => 'habitos',        'label' => 'Hábitos y recomendaciones'],
            ['id' => 'ejercicios',     'label' => 'Ejercicios'],
            ['id' => 'transformacion', 'label' => 'Módulo de Transformación'],
        ];
    @endphp

    <div class="text-sm font-medium text-center text-body border-b border-default">
        <ul class="flex flex-wrap -mb-px" id="planTabs" data-tabs-toggle="#planTabContent"
            data-tabs-active-classes="text-primary-700 hover:text-primary-700 border-primary-700"
            data-tabs-inactive-classes="border-transparent text-body hover:text-primary-700 border-soft hover:border-primary-700"
            role="tablist">
            @foreach ($planTabs as $tab)
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b border-transparent rounded-t-base"
                        id="{{ $tab['id'] }}-tab" data-tabs-target="#{{ $tab['id'] }}" type="button" role="tab"
                        aria-controls="{{ $tab['id'] }}" aria-selected="false">{{ $tab['label'] }}</button>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="planTabContent">
        @foreach ($planTabs as $tab)
            <div class="hidden py-4" id="{{ $tab['id'] }}" role="tabpanel" aria-labelledby="{{ $tab['id'] }}-tab">
                @if ($tab['id'] === 'antropometrico')
                    <x-nutritionist-patients::anthropometric />
                @elseif ($tab['id'] === 'diagnosis')
                    <x-nutritionist-patients::diagnosis-goals />
                @elseif ($tab['id'] === 'portions')
                    <x-nutritionist-patients::portions />
                @elseif ($tab['id'] === 'menu')
                    <x-nutritionist-patients::menu />
                @elseif ($tab['id'] === 'habitos')
                    <x-nutritionist-patients::habits />
                @elseif ($tab['id'] === 'ejercicios')
                    <x-nutritionist-patients::exercises />
                @endif
            </div>
        @endforeach
    </div>

    <script type="module">
        $(function () {
            const hash = window.location.hash.replace('#', '');
            if (hash) {
                const $btn = $('#' + hash + '-tab');
                if ($btn.length) $btn.trigger('click');
            }
        });
    </script>
</x-app-layout>
