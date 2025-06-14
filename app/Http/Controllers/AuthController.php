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
        // Validación de campos
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Buscamos el usuario en la base de datos
        $usuario = Usuario::where('email', $credentials['email'])->first();

        // Si existe y la contraseña es válida
        if ($usuario && Hash::check($credentials['password'], $usuario->password)) {
            Auth::login($usuario);
            return redirect()->route('dashboard');
        }

        // Si las credenciales no son válidas
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ])->withInput();
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
