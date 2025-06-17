@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Usuarios</li>
    </ol>
</nav>

<div class="logo_buttom d-flex align-items-center justify-content-between mb-4" style="padding: 20px;">
    <!-- IMG + Título -->
    <div style="display: flex; align-items: center; gap: 12px;">
        <img src="IMG/clasificacion.gif" alt="productoss" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
        <h5 class="text-big" style="margin: 0;"><strong>Usuarios</strong></h5>
    </div>

    <!-- Botón agregar producto -->
    <div>
        <a href="{{ route('usuarios.create') }}" class="btn btn-danger animated-button" style="min-width: 150px;">
            Añadir Usuarios
        </a>
    </div>
</div>

<!-- Contenedor general -->
<div class="container" style="max-width: 1200px; margin: 0 auto;">

    <!-- Buscar por nombre o cédula -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form action="{{ route('usuarios.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar por nombre o cédula" value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
    </div>


    <!-- Tabla -->
    <div class="bg-white shadow rounded-lg overflow-auto">
        <table class="table table-hover text-sm text-start align-middle">
            <thead class="bg-light text-secondary text-uppercase">
                <tr>
                    <th class="px-4 py-3">Cédula</th>
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Correo</th>
                    <th class="px-4 py-3">Rol</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td class="px-4 py-3">{{ $usuario->cedula }}</td>
                    <td class="px-4 py-3">{{ $usuario->nombre }}</td>
                    <td class="px-4 py-3">{{ $usuario->email }}</td>
                    <td class="px-4 py-3">{{ $usuario->rol->tipo ?? 'Sin rol' }}</td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <!-- Botón de Editar -->
                        <a href="{{ route('usuarios.edit', $usuario->cedula) }}" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-md" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon">
                                <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/>
                            </svg>
                        </a>
                    
                        <!-- Botón de Eliminar -->
                        <form action="{{ route('usuarios.destroy', $usuario->cedula) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer de tabla -->
        <div class="px-4 py-3 text-muted">
            {{ $usuarios->appends(request()->query())->links() }}
        </div>

        

    </div>
</div>

@endsection
