<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('seguimiento')
    ->name('tracking.')
    ->group(function () {
        Route::get('/', fn () => view('modules.tracking.views.index'))->name('index');
    });
