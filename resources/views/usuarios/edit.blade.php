@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}" style="color: #5c5b5b;">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Editar Usuario</li>
    </ol>
</nav>

<div style="display: flex; align-items: center; gap: 12px;">
    <img src="{{ asset('IMG/clasificacion.gif') }}" alt="icono usuarios" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
    <h5 class="text-big"><strong>Editar Usuario</strong></h5>
</div>

<div class="container" style="max-width: 700px;">
    <form action="{{ route('usuarios.update', $usuario->cedula) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre Completo:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $usuario->nombre }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" id="cedula" class="form-control" value="{{ $usuario->cedula }}" disabled>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>    
        
        <div class="mb-3">
            <label for="rol_id" class="form-label">Rol:</label>
            <select name="rol_id" id="rol_id" class="form-select" required>
                <option hidden value="">Seleccione un rol</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $usuario->rol_id == $rol->id ? 'selected' : '' }}>
                        {{ $rol->tipo }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Nueva Contraseña (opcional):</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
        
            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>    

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger animated-button">Cancelar</a>
            <button type="submit" class="btn btn-danger animated-button">Actualizar Usuario</button>
        </div>
    </form>
</div>
@endsection
