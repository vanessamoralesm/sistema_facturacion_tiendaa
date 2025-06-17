@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}" style="color: #5c5b5b;">Usuarios</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Agregar Usuario</li>
    </ol>
</nav>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">Por favor corrige los errores abajo.</div>
@endif

<div style="display: flex; align-items: center; gap: 12px;">
    <img src="{{ asset('IMG/clasificacion.gif') }}" alt="icono usuarios" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
    <h5 class="text-big"><strong>Agregar Nuevo Usuario</strong></h5>
</div>

<br>

<div class="container" style="max-width: 700px;">
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre Completo:</label>
                <input
                    type="text"
                    name="nombre"
                    id="nombre"
                    class="form-control @error('nombre') is-invalid @enderror"
                    placeholder="Nombre y Apellidos"
                    value="{{ old('nombre') }}"
                    required
                >
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input
                    type="text"
                    name="cedula"
                    id="cedula"
                    maxlength="20"
                    class="form-control @error('cedula') is-invalid @enderror"
                    value="{{ old('cedula') }}"
                    required
                >
                @error('cedula')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required
                >
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    required
                >
            </div>
        </div>

        <div class="mb-3">
            <label for="rol_id" class="form-label">Rol:</label>
            <select
                name="rol_id"
                id="rol_id"
                class="form-select @error('rol_id') is-invalid @enderror"
                required
            >
                <option hidden value="">Seleccione un rol</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ old('rol_id') == $rol->id ? 'selected' : '' }}>{{ $rol->tipo }}</option>
                @endforeach
            </select>
            @error('rol_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger animated-button">Cancelar</a>
            <button type="submit" class="btn btn-danger animated-button">Guardar Usuario</button>
        </div>
    </form>
</div>
@endsection
