<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:patient'])
    ->prefix('paciente/citas')
    ->name('patient.appointments.')
    ->group(function () {
        Route::get('/', fn () => view('modules.patient.appointments.views.index'))->name('index');
    });
