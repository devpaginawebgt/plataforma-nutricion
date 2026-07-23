<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('pacientes')
    ->name('patients.')
    ->group(function () {
        Route::get('', function () {
            return view('modules.patients.views.index');
        })->name('index');

        Route::get('/ver', function () {
            return view('modules.patients.views.show');
        })->name('show');
    });
