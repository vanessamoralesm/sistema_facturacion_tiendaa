<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario; // tu modelo de usuarios

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    /**
     * Procesa el login.
     */
        public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $usuario = Usuario::where('email', $credentials['email'])->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'Usuario no encontrado'])->withInput();
        }

        // Log para depurar valor de password en BD
        logger('Password en BD:', ['password' => $usuario->password]);

        // Validar que la contraseña tenga formato bcrypt (60 caracteres, empieza con $2y$, $2a$ o $2b$)
        if (!preg_match('/^\$2[ayb]\$.{56}$/', $usuario->password)) {
            // Aquí podrías intentar la comparación con texto plano (migración)
            if ($credentials['password'] === $usuario->password) {
                $usuario->password = Hash::make($credentials['password']);
                $usuario->save();

                Auth::login($usuario);
                return view('splash');
            } else {
                return back()->withErrors(['email' => 'Contraseña en base de datos no válida'])->withInput();
            }
        }

        // Si pasó la validación, verificamos con Hash::check
        if (Hash::check($credentials['password'], $usuario->password)) {
            Auth::login($usuario);
            return redirect()->route('splash');
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden'])->withInput();
    }
    /**
     * Procesa el logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida la sesión completamente
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}