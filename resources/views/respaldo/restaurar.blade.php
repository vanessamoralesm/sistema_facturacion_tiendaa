@extends('layoutPrincipal')

@section('contenido')
<div class="container mt-5">
  <h4>Restaurar Base de Datos</h4>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <form action="{{ route('restaurar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="respaldo" class="form-label">Selecciona archivo .sql</label>
      <input type="file" class="form-control" id="respaldo" name="respaldo" accept=".sql" required>
    </div>
    <button type="submit" class="btn btn-warning">Restaurar</button>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
@endsection