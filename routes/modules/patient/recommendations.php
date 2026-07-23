<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:patient'])
    ->prefix('paciente/recomendaciones')
    ->name('patient.recommendations.')
    ->group(function () {
        Route::get('/', fn () => view('modules.patient.recommendations.views.index'))->name('index');
    });
