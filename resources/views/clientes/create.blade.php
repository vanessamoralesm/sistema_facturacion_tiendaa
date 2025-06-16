@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}" style="color: #5c5b5b;">Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Agregar Cliente</li>
    </ol>
</nav>

<div style="display: flex; align-items: center; gap: 12px;">
    <img src={{ asset("IMG/target.gif") }} alt="clientess" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
    <h5 class="text-big" style="margin: 0;"><strong>Agregar Clientes</strong></h5>
</div>

<br>

<div class="container bg-white shadow-md rounded p-4" style="max-width: 700px;">
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre Completo:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre y Apellidos" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" name="cedula" id="cedula" class="form-control" maxlength="20" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="correo" id="email" class="form-control" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Direccion:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Telefono:</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required>
            </div>
        </div>
        
    
        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
        </div>
    </form>
</div>
@endsection