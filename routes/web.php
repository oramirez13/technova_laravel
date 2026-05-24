<?php

use App\Http\Controllers\AvanceController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('idioma/{locale}', function ($locale) {
    if ($locale == 'es' || $locale == 'en') {
        session(['locale' => $locale]);
    }

    return redirect()->back();
})->name('idioma.cambiar');

/* PROYECTOS */
Route::resource('proyectos', ProyectoController::class);
Route::resource('sprints', SprintController::class);
Route::resource('tareas', TareaController::class);
Route::resource('avances', AvanceController::class);
Route::resource('usuarios', UsuarioController::class);
