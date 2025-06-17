@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" style="color: #5c5b5b;">Roles</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Editar Rol</li>
    </ol>
</nav>

<div style="display: flex; align-items: center; gap: 12px;">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
        viewBox="0 0 24 24" stroke-width="1.5" 
        stroke="currentColor" 
        width="100" height="100">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
    </svg>
    <h5 class="text-big"><strong>Editar Rol</strong></h5>
</div>


<br>

<div class="container bg-white shadow-md rounded p-4" style="max-width: 700px;">
    <form action="{{ route('roles.update', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tipo" class="form-label">Nombre del Rol:</label>
            <input type="text" name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $rol->tipo) }}" required>
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('roles.index') }}" class="btn btn-danger animated-button">Cancelar</a>
            <button type="submit" class="btn btn-danger animated-button">Actualizar Rol</button>
        </div>
    </form>
</div>
@endsection
