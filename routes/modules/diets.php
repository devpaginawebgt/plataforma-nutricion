<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('dietas')
    ->name('diets.')
    ->group(function () {
<<<<<<< HEAD
        Route::get('', function () {
            return view('modules.diets.views.index');
        })->name('index');
=======
        Route::get('/', fn () => view('modules.diets.views.index'))->name('index');
>>>>>>> 051684c9c5b7ef794fdbd6680e1122ab8be1248a
    });
