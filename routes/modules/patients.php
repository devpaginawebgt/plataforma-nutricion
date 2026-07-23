<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('pacientes')
    ->name('patients.')
    ->group(function () {
<<<<<<< HEAD
        Route::get('', function () {
            return view('modules.patients.views.index');
        })->name('index');
        
        Route::get('/ver', function () {
            return view('modules.patients.views.show');
        })->name('show');
=======
        Route::get('', fn () => view('modules.patients.views.index'))->name('index');

        // Route::get('/', [\App\Http\Controllers\Patients\PatientController::class, 'index'])->name('index');
        // Route::get('/crear', [\App\Http\Controllers\Patients\PatientController::class, 'create'])->name('create');
        // Route::post('/', [\App\Http\Controllers\Patients\PatientController::class, 'store'])->name('store');
        // Route::get('/{patient}', [\App\Http\Controllers\Patients\PatientController::class, 'show'])->name('show');
        // Route::get('/{patient}/editar', [\App\Http\Controllers\Patients\PatientController::class, 'edit'])->name('edit');
        // Route::put('/{patient}', [\App\Http\Controllers\Patients\PatientController::class, 'update'])->name('update');
        // Route::delete('/{patient}', [\App\Http\Controllers\Patients\PatientController::class, 'destroy'])->name('destroy');
>>>>>>> 051684c9c5b7ef794fdbd6680e1122ab8be1248a
    });
