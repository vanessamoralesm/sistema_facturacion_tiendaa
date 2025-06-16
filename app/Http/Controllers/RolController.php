<?php
namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    
    }

    // Mostrar formulario para crear nuevo rol
    public function create()
    {
        return view('roles.create');
    }

    // Guardar nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|unique:roles,tipo|max:255',
        ]);

        Rol::create([
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    // Mostrar formulario para editar un rol existente
    public function edit($id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.edit', compact('rol'));
    }

    // Actualizar el rol
    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $request->validate([
            'tipo' => 'required|string|max:255|unique:roles,tipo,' . $rol->id,
        ]);

        $rol->update([
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente.');
    }
    // Eliminar rol
    public function destroy($id)
    {
        // Buscar el rol
        $rol = Rol::findOrFail($id);
    
        // Verificar si hay usuarios que tienen este rol asignado
        $usuariosConRol = Usuario::where('rol_id', $rol->id)->exists();
    
        if ($usuariosConRol) {
            return redirect()->route('roles.index')->with('error', 'No se puede eliminar el rol porque está asignado a uno o más usuarios.');
        }
    
        // Si no está en uso, eliminar
        $rol->delete();
    
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    }
    
}
