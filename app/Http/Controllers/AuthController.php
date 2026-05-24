<?php

// Este namespace indica que el controlador pertenece al espacio de controladores HTTP de la aplicación.
namespace App\Http\Controllers;

// Este modelo representa a los usuarios registrados dentro de la base de datos.
use App\Models\User;
// Esta clase permite trabajar con los datos de la petición HTTP actual.
use Illuminate\Http\Request;
// Esta fachada permite autenticar usuarios usando el sistema de sesión de Laravel.
use Illuminate\Support\Facades\Auth;
// Esta fachada permite encriptar contraseñas antes de guardarlas.
use Illuminate\Support\Facades\Hash;

// Esta clase controla el inicio de sesión, el registro y el cierre de sesión.
class AuthController extends Controller
{
    // Este método muestra la vista con el formulario para iniciar sesión.
    public function mostrarFormularioInicioSesion()
    {
        // Retorna la vista ubicada en resources/views/auth/login.blade.php.
        return view('auth.login');
    }

    // Este método procesa los datos del formulario de inicio de sesión.
    public function iniciarSesion(Request $request)
    {
        // Valida que el correo y la contraseña hayan sido enviados correctamente.
        $datos = $request->validate([
            // Exige un correo válido con un tamaño máximo razonable.
            'email' => 'required|email|max:255',
            // Exige que la contraseña no venga vacía.
            'password' => 'required|string',
        ]);

        // Intenta autenticar al usuario usando el correo y la contraseña recibidos.
        if (Auth::attempt(['email' => $datos['email'], 'password' => $datos['password']])) {
            // Regenera la sesión para evitar problemas de seguridad después del login.
            $request->session()->regenerate();

            // Redirige al listado de proyectos con un mensaje de éxito.
            return redirect()->route('proyectos.index')
                ->with('success', 'Inicio de sesión realizado correctamente.');
        }

        // Si los datos no son válidos, vuelve al formulario con un error.
        return back()
            ->withErrors([
                // Muestra un mensaje de error asociado al campo de correo.
                'email' => 'Las credenciales ingresadas no son correctas.',
            ])
            // Conserva el correo escrito para no obligar al usuario a escribirlo otra vez.
            ->onlyInput('email');
    }

    // Este método muestra la vista con el formulario para registrar un usuario nuevo.
    public function mostrarFormularioRegistro()
    {
        // Retorna la vista ubicada en resources/views/auth/register.blade.php.
        return view('auth.register');
    }

    // Este método guarda un nuevo usuario y luego lo autentica dentro del sistema.
    public function registrar(Request $request)
    {
        // Valida los datos enviados desde el formulario de registro.
        $datos = $request->validate([
            // Solicita el nombre completo del nuevo usuario.
            'name' => 'required|string|max:255',
            // Solicita un correo único para evitar usuarios duplicados.
            'email' => 'required|email|max:255|unique:users,email',
            // Solicita que el rol pertenezca a una lista básica de opciones válidas.
            'rol' => 'required|in:administrador,desarrollador,analista,tester',
            // Solicita una contraseña con confirmación para reducir errores de escritura.
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea el nuevo usuario con los datos validados.
        $usuario = User::create([
            // Guarda el nombre indicado por el usuario.
            'name' => $datos['name'],
            // Guarda el correo indicado por el usuario.
            'email' => $datos['email'],
            // Guarda el rol seleccionado en el formulario.
            'rol' => $datos['rol'],
            // Guarda la contraseña encriptada para no almacenarla en texto plano.
            'password' => Hash::make($datos['password']),
        ]);

        // Inicia sesión automáticamente con el usuario recién creado.
        Auth::login($usuario);

        // Regenera la sesión después del registro para reforzar la seguridad.
        $request->session()->regenerate();

        // Envía al usuario a la zona interna del sistema con un mensaje de confirmación.
        return redirect()->route('proyectos.index')
            ->with('success', 'Usuario registrado correctamente.');
    }

    // Este método cierra la sesión activa del usuario.
    public function cerrarSesion(Request $request)
    {
        // Cierra la sesión autenticada actual.
        Auth::logout();

        // Elimina todos los datos guardados en la sesión anterior.
        $request->session()->invalidate();

        // Genera un nuevo token CSRF para la siguiente sesión del navegador.
        $request->session()->regenerateToken();

        // Redirige al inicio público con un mensaje de salida correcta.
        return redirect()->route('login')
            ->with('success', 'Sesión cerrada correctamente.');
    }
}
