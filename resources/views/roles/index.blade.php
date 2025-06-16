@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Roles</li>
  </ol>
</nav>
    
<div style="display: flex; align-items: center; gap: 12px;">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" 
    viewBox="0 0 24 24" stroke-width="1.5" 
    stroke="currentColor" 
    width="100" height="100">
    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
  </svg>
  <h5 class="text-roles">Roles</h5>
</div>

<div class="col-md-12 text-end" style="margin-top: -50px;">
  <div class="boton-derecha">
    <a href="{{ route('roles.create') }}" class="add-btn">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-svg" width="24" height="24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>
      Agregar
    </a>
  </div>
</div>

<br>

<div class="container-buttons">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="px-6 py-3 text-sm text-gray-600">
      <div class="roles-grid">
        @forelse ($roles as $rol)
          <div class="role-card">
            <span>{{ $rol->id }} - {{ $rol->tipo }}</span>
            <div class="actions">
              <a href="{{ route('roles.edit', $rol->id) }}" class="bg-green p-2 rounded-md" title="Editar">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen-icon">
                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/>
                </svg>
              </a>

              <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este rol?')" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red p-2 rounded-md" title="Eliminar">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon">
                    <path d="M3 6h18"/>
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                    <line x1="10" x2="10" y1="11" y2="17"/>
                    <line x1="14" x2="14" y1="11" y2="17"/>
                  </svg>
                </button>
              </form>
            </div>
          </div>
        @empty
          <p class="text-center text-muted">No hay roles registrados.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
