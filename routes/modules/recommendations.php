<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('recomendaciones')
    ->name('recommendations.')
    ->group(function () {
        Route::get('/', fn () => view('modules.recommendations.views.index'))->name('index');
    });
