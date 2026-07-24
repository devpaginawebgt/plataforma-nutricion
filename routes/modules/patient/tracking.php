<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:patient'])
    ->prefix('paciente/progreso')
    ->name('patient.tracking.')
    ->group(function () {
        Route::get('/', fn () => view('modules.patient.tracking.views.index'))->name('index');
    });
