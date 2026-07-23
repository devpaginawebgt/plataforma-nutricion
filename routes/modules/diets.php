<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dietas')
    ->name('dietas.')
    ->group(function () {
        Route::get('', function () {
            return view('modules.diets.views.index');
        })->name('index');
    });
