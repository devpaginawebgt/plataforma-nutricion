<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('citas')
    ->name('citas.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Appointments\AppointmentController::class, 'index'])->name('index');
    });
