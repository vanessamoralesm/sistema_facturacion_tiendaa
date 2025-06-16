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
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $usuario = Usuario::where('email', $request->email)->first();
    
        if ($usuario && Hash::check($request->password, $usuario->password)) {
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
    
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
