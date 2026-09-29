<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])
    ->prefix('transformacion')
    ->name('transformation.')
    ->group(function () {
        Route::get('/', fn () => view('modules.nutritionist.transformation.views.index'))->name('index');
    });
