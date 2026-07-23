<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', fn () => view('modules.patient.dashboard.views.index'))->name('patient.dashboard');
});
