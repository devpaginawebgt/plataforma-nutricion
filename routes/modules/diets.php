<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dietas')
    ->name('dietas.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Diets\DietController::class, 'index'])->name('index');
    });
