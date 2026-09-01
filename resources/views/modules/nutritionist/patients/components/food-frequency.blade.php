@props([
    'alimentos' => [
        ['label' => 'Chucherías', 'icon' => 'lucide--candy'],
        ['label' => 'Galletas', 'icon' => 'lucide--cookie'],
        ['label' => 'Dulces', 'icon' => 'lucide--candy'],
        ['label' => 'Chocolates', 'icon' => 'lucide--square'],
        ['label' => 'Jugos', 'icon' => 'lucide--cup-soda'],
        ['label' => 'Gaseosas', 'icon' => 'lucide--cup-soda'],
        ['label' => 'Embutidos', 'icon' => 'lucide--utensils'],
        ['label' => 'Frances', 'icon' => 'lucide--croissant'],
        ['label' => 'Pan dulce', 'icon' => 'lucide--cake'],
        ['label' => 'Tortilla', 'icon' => 'lucide--circle'],
        ['label' => 'Frutas', 'icon' => 'lucide--apple'],
        ['label' => 'Vegetales', 'icon' => 'lucide--leaf'],
        ['label' => 'Hierbas', 'icon' => 'lucide--leaf'],
        ['label' => 'Tamales', 'icon' => 'lucide--wheat'],
        ['label' => 'Paches', 'icon' => 'lucide--wheat'],
        ['label' => 'Chuchitos', 'icon' => 'lucide--wheat'],
        ['label' => 'Dobladas', 'icon' => 'lucide--croissant'],
        ['label' => 'Chicharrones', 'icon' => 'lucide--beef'],
        ['label' => 'Carnitas', 'icon' => 'lucide--beef'],
        ['label' => 'Sopas de bolsa', 'icon' => 'lucide--soup'],
        ['label' => 'Sopas instantáneas', 'icon' => 'lucide--soup'],
        ['label' => 'Mayonesa', 'icon' => 'lucide--milk'],
        ['label' => 'Mostaza', 'icon' => 'lucide--milk'],
        ['label' => 'Ketchup', 'icon' => 'lucide--milk'],
        ['label' => 'Bebidas energéticas', 'icon' => 'lucide--zap'],
        ['label' => 'Pastel', 'icon' => 'lucide--cake'],
        ['label' => 'Helado', 'icon' => 'lucide--ice-cream'],
        ['label' => 'Café', 'icon' => 'lucide--coffee'],
        ['label' => 'Cerdo', 'icon' => 'lucide--beef'],
        ['label' => 'Res', 'icon' => 'lucide--beef'],
        ['label' => 'Pollo', 'icon' => 'lucide--drumstick'],
        ['label' => 'Pescado', 'icon' => 'lucide--fish'],
        ['label' => 'Comida de la calle', 'icon' => 'lucide--utensils'],
    ],
    'frecuencias' => [
        ['label' => 'Diario', 'sub' => '(veces al día)'],
        ['label' => 'Semanal', 'sub' => '(veces/semana)'],
        ['label' => 'Quincenal', 'sub' => '(veces/quincena)'],
        ['label' => 'Mensual', 'sub' => '(veces/mes)'],
    ],
])

<div class="p-5 md:pt-0">
    <div class="flex items-center gap-2 mb-4">
        <span class="icon-[lucide--clipboard-list] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
        <p class="text-[11px] font-semibold uppercase tracking-wide text-muted">Frecuencia de Consumo de Alimentos</p>
    </div>

    <div class="rounded-default border-card">
        <table id="food-frequency-table" class="w-full text-xs">
            <thead class="bg-primary-50/60 dark:bg-primary-900/10">
                <tr class="text-muted">
                    <th class="text-left px-3 py-2 font-semibold whitespace-nowrap">Alimento</th>
                    <th class="text-left px-3 py-2 font-semibold whitespace-nowrap">
                        Cantidad
                        <span class="block text-2xs font-normal normal-case text-muted">(por porción)</span>
                    </th>
                    @foreach ($frecuencias as $freq)
                        <th class="text-center px-3 py-2 font-semibold whitespace-nowrap">
                            {{ $freq['label'] }}
                            <span class="block text-2xs font-normal normal-case text-muted">{{ $freq['sub'] }}</span>
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-default">
                @foreach ($alimentos as $alimento)
                    <tr>
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <span class="icon-[{{ $alimento['icon'] }}] w-4 h-4 text-primary-700 dark:text-primary-300"></span>
                                <span class="font-medium text-strong">{{ $alimento['label'] }}</span>
                            </div>
                        </td>
                        <td class="px-3 py-2">
                            <x-text-input type="text" class="w-32" />
                        </td>
                        @foreach ($frecuencias as $freq)
                            <td class="px-3 py-2 text-center">
                                <div class="inline-flex items-center gap-2">
                                    <button type="button" class="w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center text-sm font-bold hover:bg-primary-200 dark:hover:bg-primary-900/60">−</button>
                                    <span class="w-4 text-center text-sm font-semibold text-strong">0</span>
                                    <button type="button" class="w-6 h-6 rounded-full bg-primary-100 dark:bg-primary-900/40 text-primary-700 dark:text-primary-300 flex items-center justify-center text-sm font-bold hover:bg-primary-200 dark:hover:bg-primary-900/60">+</button>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3 flex justify-end">
        <button type="button" class="inline-flex items-center gap-2 rounded-default border border-primary-600 text-primary-700 dark:text-primary-300 hover:bg-primary-50 dark:hover:bg-primary-900/20 px-4 py-2 text-sm font-semibold">
            <span>Guardar cambios</span>
            <span class="icon-[lucide--check-circle] w-4 h-4"></span>
        </button>
    </div>
</div>

<script type="module">
    $(function () {
        initDataTable('#food-frequency-table', {
            paging: false,
            searching: false,
            info: false,
            ordering: false,
            responsive: true,
        });
    });
</script>
