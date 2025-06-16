<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    // Mostrar lista de productos con búsqueda
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $productos = Producto::when($buscar, function ($query, $buscar) {
                return $query->where('nombre', 'like', "%$buscar%")
                            ->orWhere('id', 'like', "%$buscar%")
                            ->orWhere('marca', 'like', "%$buscar%")
                            ->orWhere('tipo', 'like', "%$buscar%");
            })
            ->orderBy('id', 'desc')
            ->paginate(4);

        return view('productos.index', compact('productos'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('productos.create');
    }

    // Almacenar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('productos')->where(function ($query) use ($request) {
                    return $query->where('marca', $request->marca)
                                 ->where('tipo', $request->tipo)
                                 ->where('talla', $request->talla)
                                 ->where('color', $request->color);
                }),
            ],
            'marca' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'talla' => 'required|string|max:10',
            'color' => 'required|string|max:50',
            'detalle' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'cant_disponible' => 'required|integer|min:0',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'tipo' => $request->tipo,
            'talla' => $request->talla,
            'color' => $request->color,
            'detalle' => $request->detalle,
            'precio' => $request->precio,
            'cant_disponible' => $request->cant_disponible,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar producto existente
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('productos')->ignore($producto->id)->where(function ($query) use ($request) {
                    return $query->where('marca', $request->marca)
                                 ->where('tipo', $request->tipo)
                                 ->where('talla', $request->talla)
                                 ->where('color', $request->color);
                }),
            ],
            'marca' => 'required|string|max:255',
            'tipo' => 'required|string|max:50',
            'talla' => 'required|string|max:10',
            'color' => 'required|string|max:50',
            'detalle' => 'required|string|max:1000',
            'precio' => 'required|numeric|min:0',
            'cant_disponible' => 'required|integer|min:0',
        ]);
        
        
        $producto->update([
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'tipo' => $request->tipo,
            'talla' => $request->talla,
            'color' => $request->color,
            'detalle' => $request->detalle,
            'precio' => $request->precio,
            'cant_disponible' => $request->cant_disponible,
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
