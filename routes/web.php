<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvanceController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Esta ruta muestra la página de inicio principal del sistema.
Route::get('/', function () {
    // Retorna la vista llamada "inicio" para visitantes y usuarios autenticados.
    return view('inicio');
});

// Esta ruta cambia el idioma de la interfaz entre español e inglés.
Route::get('idioma/{locale}', function ($locale) {
    // Verifica que el idioma recibido sea uno de los permitidos.
    if ($locale == 'es' || $locale == 'en') {
        // Guarda el idioma seleccionado en la sesión actual del usuario.
        session(['locale' => $locale]);
    }

    // Devuelve al usuario a la página anterior después del cambio de idioma.
    return redirect()->back();
})->name('idioma.cambiar');

// Este grupo solo permite entrar a usuarios que todavía no han iniciado sesión.
Route::middleware('guest')->group(function () {
    // Muestra el formulario para iniciar sesión.
    Route::get('/iniciar-sesion', [AuthController::class, 'mostrarFormularioInicioSesion'])
        ->name('login');

    // Procesa los datos enviados desde el formulario de inicio de sesión.
    Route::post('/iniciar-sesion', [AuthController::class, 'iniciarSesion'])
        ->name('login.store');

    // Muestra el formulario para registrar un nuevo usuario.
    Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])
        ->name('register');

    // Guarda en la base de datos el nuevo usuario registrado.
    Route::post('/registro', [AuthController::class, 'registrar'])
        ->name('register.store');
});

// Este grupo solo permite entrar a usuarios que ya iniciaron sesión.
Route::middleware('auth')->group(function () {
    // Cierra la sesión activa del usuario autenticado.
    Route::post('/cerrar-sesion', [AuthController::class, 'cerrarSesion'])
        ->name('logout');

    // Estas rutas permiten administrar los proyectos del sistema.
    Route::resource('proyectos', ProyectoController::class);

    // Estas rutas permiten administrar los sprints del sistema.
    Route::resource('sprints', SprintController::class);

    // Estas rutas permiten administrar las tareas del sistema.
    Route::resource('tareas', TareaController::class);

    // Estas rutas permiten administrar los avances del sistema.
    Route::resource('avances', AvanceController::class);

    // Estas rutas permiten administrar los usuarios del sistema.
    Route::resource('usuarios', UsuarioController::class);
});
