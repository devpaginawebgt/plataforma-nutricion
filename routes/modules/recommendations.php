<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('recomendaciones')
    ->name('recomendaciones.')
    ->group(function () {
        // Route::get('/', [\App\Http\Controllers\Recommendations\RecommendationController::class, 'index'])->name('index');
    });
