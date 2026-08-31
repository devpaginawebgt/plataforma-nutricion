<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('ejercicios')
    ->name('exercises.')
    ->group(function () {
        Route::get('/', fn () => view('modules.nutritionist.exercises.views.index'))->name('index');
    });
