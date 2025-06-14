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
    <h3>Bienvenid@!, {{ Auth::user()->nombre }}</h3>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn btn-outline-danger">Cerrar sesión</button>
    </form>
    
  </div>
</div>
@endauth


@endsection
