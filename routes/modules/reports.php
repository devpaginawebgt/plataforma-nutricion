<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('reportes')
    ->name('reports.')
    ->group(function () {
        Route::get('/', fn () => view('modules.reports.views.index'))->name('index');
    });
