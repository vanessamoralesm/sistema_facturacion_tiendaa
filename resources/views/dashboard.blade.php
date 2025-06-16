@extends('layoutPrincipal')

@section('contenido')

<div class="carrusel-container">
  <div class="carrusel-slide">
    <img src="{{ asset('IMG/3_tienda_blanco_madera_interiorismo-1024x592.jpg') }}" alt="Imagen 1">
    <img src="{{ asset('IMG/casual.jpg') }}" alt="Imagen 2">
    <img src="{{ asset('IMG/beauty.jpg') }}" alt="Imagen 3">
    <img src="{{ asset('IMG/GFashion.jpg') }}" alt="Imagen 4">
    <img src="{{ asset('IMG/logo_home.jpg') }}" alt="Imagen 5">
    <img src="{{ asset('IMG/tiendaa.jpg') }}" alt="Imagen 6">
  </div>
</div>

@auth
<div class="card-container">
  <div class="card">
    <h3 class="letraa" >Bienvenid@!, {{ Auth::user()->nombre }}</h3>
 
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout" style="margin-left: 160px">Cerrar sesión</button>
    </form>

    @if(strtolower(Auth::user()->rol->tipo) != 'vendedor')
      <div class="respaldo">
        <a href="{{ route('respaldar') }}" class="logout">
          <button class="bi bi-hdd-stack-fill"></button> Respaldar Base de Datos
        </a>

        <a href="{{ route('vista.restaurar') }}" class="logout">
          <button class="bi bi-arrow-clockwise"></button> Restaurar Base de Datos
        </a>
      </div>
    @endif

  </div>
</div>
@endauth

<!-- Modal -->
<div class="modal fade" id="respaldoModal" tabindex="-1" aria-labelledby="respaldoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="respaldoModalLabel">¡Éxito!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
      <div class="modal-footer">
        @if(session('filename'))
          <a href="{{ route('descargar.archivo', session('filename')) }}" class="btn btn-primary">
            Descargar Respaldo
          </a>
        @endif
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Scripts Bootstrap (asegúrate que los tienes) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@if(session('success'))
<script>
  var respaldoModal = new bootstrap.Modal(document.getElementById('respaldoModal'));
  respaldoModal.show();
</script>
@endif


@endsection