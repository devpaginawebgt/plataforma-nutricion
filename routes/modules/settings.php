<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('configuracion')
    ->name('settings.')
    ->group(function () {
        Route::get('/', fn () => view('modules.settings.views.index'))->name('index');
    });
