@extends('layoutprincipal')

@section('contenido')
<br>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page" style="color: #3d3a3a;">Facturas</li>
    </ol>
</nav>

<div class="logo_buttom d-flex align-items-center justify-content-between mb-4" style="padding: 20px;">
    <!-- IMG + Título -->
    <div style="display: flex; align-items: center; gap: 12px;">
        <img src="{{ asset('IMG/factura.gif') }}" alt="facturass" width="150" height="150" style="border-radius: 50%; object-fit: cover;">
        <h5 class="text-big" style="margin: 0;"><strong>Comprobantes</strong></h5>
    </div>

    <!-- Botón agregar factura -->
    <div>
        <a href="{{ route('facturas.create') }}" class="btn btn-danger animated-button" style="min-width: 150px;">
            Nueva Factura
        </a>
    </div>
</div>

<div class="container" style="max-width: 1200px; margin: 0 auto;">

    <!-- Buscar solo por ID -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form action="{{ route('facturas.index') }}" method="GET" class="d-flex w-50">
            <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar por ID de factura" value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-success">Buscar</button>
        </form>
    </div>

    <div class="bg-white shadow rounded-lg overflow-auto">
        <table class="table table-hover text-sm text-start align-middle">
            <thead class="bg-light text-secondary text-uppercase">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Vendedor</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Método de Pago</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($facturas as $factura)
                <tr>
                    <td class="px-4 py-3">{{ $factura->id }}</td>
                    <td class="px-4 py-3">{{ $factura->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-3">{{ $factura->cliente->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-3">{{ $factura->usuario->nombre ?? 'N/A' }}</td>
                    <td class="px-4 py-3">C$ {{ number_format($factura->total, 2) }}</td>
                    <td class="px-4 py-3">{{ $factura->metodo_pago }}</td>
                    <td class="px-6 py-4 flex justify-center gap-2">
                        <!-- Botón Ver -->
                        <a href="{{ route('facturas.show', $factura->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md" title="Ver">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                              </svg>
                        </a>

                        <!-- Botón PDF -->
                        <a href="{{ route('facturas.pdf', $factura->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-md" title="PDF">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20" height="20" fill="currentColor" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                <path d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z"/>
                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103"/>
                              </svg>
                        </a>

                        <!-- Botón Eliminar solo para admin -->

                        @if(strtolower(Auth::user()->rol->tipo) != 'vendedor')
                        <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta factura?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-md" title="Eliminar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon">
                                    <path d="M3 6h18"/>
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                    <line x1="10" x2="10" y1="11" y2="17"/>
                                    <line x1="14" x2="14" y1="11" y2="17"/>
                                </svg>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">No hay facturas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="px-4 py-3 text-muted">
            {{ $facturas->appends(request()->query())->links() }}
        </div>

    </div>
</div>

@endsection
