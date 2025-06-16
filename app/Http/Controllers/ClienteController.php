<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar listado de clientes con búsqueda y paginación
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $clientes = Cliente::when($buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%$buscar%")
                      ->orWhere('cedula', 'like', "%$buscar%");
            })
            ->orderBy('nombre')
            ->paginate(3);

        return view('clientes.index', compact('clientes'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('clientes.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'correo'    => 'required|email|unique:clientes,correo',
            'nombre'    => 'required|string|max:100',
            'cedula'    => 'required|string|unique:clientes,cedula',
            'direccion' => 'required|string|max:255',
            'telefono'  => 'required|numeric|digits:8',
        ]);

        Cliente::create($request->only(['cedula', 'nombre', 'correo', 'direccion', 'telefono']));

        return redirect()->route('clientes.index')
            ->with('success', 'Usuario creado correctamente')
            ->with('accion', 'agregar');
    }

    // Mostrar cliente para editar
    public function edit(string $cedula)
    {
        $cliente = Cliente::findOrFail($cedula);
        return view('clientes.edit', compact('cliente'));
    }

    // Actualizar datos de un cliente
    public function update(Request $request, string $cedula)
    {
        $cliente = Cliente::findOrFail($cedula);

        $request->validate([
            'nombre'    => 'required|string|max:100',
            'correo'    => 'required|email|unique:clientes,correo,' . $cliente->cedula . ',cedula',
            'direccion' => 'required|string|max:255',
            'telefono'  => 'required|numeric|digits:8',
        ]);

        $cliente->update($request->only(['nombre', 'correo', 'direccion', 'telefono']));

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente')
            ->with('accion', 'actualizar');
    }

    // Eliminar cliente
    public function destroy(string $cedula)
    {
        $cliente = Cliente::findOrFail($cedula);
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Usuario eliminado correctamente')
            ->with('accion', 'eliminar');
    }
}
