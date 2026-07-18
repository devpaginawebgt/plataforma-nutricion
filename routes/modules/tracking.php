<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('seguimiento')
    ->name('seguimiento.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Tracking\TrackingController::class, 'index'])->name('index');
    });
