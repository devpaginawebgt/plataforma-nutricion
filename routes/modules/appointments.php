<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('citas')
    ->name('appointments.')
    ->group(function () {
        Route::get('/', fn () => view('modules/appointments/views/index'))->name('index');
    });
