<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('recomendaciones')
    ->name('recommendations.')
    ->group(function () {
        Route::get('/', fn () => view('modules.recommendations.views.index'))->name('index');
    });
