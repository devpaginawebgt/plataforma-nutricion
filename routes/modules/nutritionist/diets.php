<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('dietas')
    ->name('diets.')
    ->group(function () {
        Route::get('', function () {
            return view('modules.nutritionist.diets.views.index');
        })->name('index');
    });
