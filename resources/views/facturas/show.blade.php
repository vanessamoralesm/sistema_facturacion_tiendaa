@extends('layoutprincipal')

@section('contenido')
<div class="container mt-4" style="max-width: 800px; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">

    <h3 class="text-center mb-4"><strong>Comprobante de Factura</strong></h3>

    <div class="datos-principales">
        <div class="factura-info">
            <p><strong>Factura #:</strong> {{ $factura->id }}</p>
            <p><strong>Fecha:</strong> 
                {{ \Carbon\Carbon::parse($factura->fecha)->setTimezone('America/Managua')->format('d/m/Y H:i') ?? 'No disponible' }}
            </p>
            <p><strong>Método de Pago:</strong> {{ $factura->metodo_pago }}</p>
        </div>
    </div>

    <hr>

    <div class="datos-cliente-vendedor">
        <div class="cliente">
            <h5><strong>Cliente</strong></h5>
            <p><strong>Nombre:</strong> {{ $factura->cliente->nombre ?? 'N/A' }}</p>
            <p><strong>Cédula:</strong> {{ $factura->cliente->cedula ?? 'N/A' }}</p>
            <p><strong>Celular:</strong> {{ $factura->cliente->celular ?? 'N/A' }}</p>
        </div>

        <div class="vendedor">
            <h5><strong>Vendedor</strong></h5>
            <p><strong>Nombre:</strong> {{ $factura->usuario->nombre ?? 'N/A' }}</p>
            <p><strong>Cédula:</strong> {{ $factura->usuario->cedula ?? 'N/A' }}</p>
        </div>
    </div>

    <hr>

    <h5><strong>Detalle de Productos</strong></h5>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Descuento</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factura->productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad}}</td>
                    <td>C$ {{ number_format($producto->pivot->precio, 2) }}</td>
                    <td>{{ $producto->pivot->descuento }}%</td>
                    <td>C$ {{ number_format($producto->pivot->subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="text-end">
        <p><strong>Subtotal:</strong> C$ {{ number_format($subtotal, 2) }}</p>
        <p><strong>IVA:</strong> C$ {{ number_format($factura->iva, 2) }}</p>
        <p><strong>Total:</strong> <span class="text-success">C$ {{ number_format($factura->total, 2) }}</span></p>
        <p><strong>Monto Recibido:</strong> C$ {{ number_format($factura->monto_recibido, 2) }}</p>
        <p><strong>Vuelto:</strong> C$ {{ number_format($factura->vuelto, 2) }}</p>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    
    <div class="text-center mt-3">
        <a href="{{ route('facturas.pdf', $factura->id) }}" class="btn btn-danger">
            Descargar PDF
        </a>
    </div>

</div>

<style>
    .datos-cliente-vendedor {
        display: flex;
        justify-content: space-between;
        gap: 40px;
        margin-bottom: 20px;
    }

    .datos-cliente-vendedor div {
        flex: 1;
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    h5 {
        font-weight: 700;
        margin-bottom: 15px;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .text-end p {
        font-size: 1.1rem;
    }

    .text-success {
        font-weight: bold;
        color: green;
    }
</style>
@endsection
