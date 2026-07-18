<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('configuracion')
    ->name('configuracion.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Settings\SettingsController::class, 'index'])->name('index');
    });
