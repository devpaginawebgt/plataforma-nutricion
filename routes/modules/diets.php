<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dietas')
    ->name('diets.')
    ->group(function () {
        Route::get('/', fn () => view('modules.diets.views.index'))->name('index');
    });
