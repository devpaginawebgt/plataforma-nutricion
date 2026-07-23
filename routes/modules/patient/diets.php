<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:patient'])
    ->prefix('paciente/plan-nutricional')
    ->name('patient.diets.')
    ->group(function () {
        Route::get('/', fn () => view('modules.patient.diets.views.index'))->name('index');
    });
