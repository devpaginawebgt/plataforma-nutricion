<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('reportes')
    ->name('reportes.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Reports\ReportController::class, 'index'])->name('index');
    });
