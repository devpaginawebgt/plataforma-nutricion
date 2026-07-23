<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:nutritionist'])->group(function () {
    Route::get('/dashboard', fn () => view('modules.nutritionist.dashboard.views.index'))->name('dashboard');
});
