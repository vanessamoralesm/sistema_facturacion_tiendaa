<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura #{{ $factura->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #005577;
            padding-bottom: 10px;
        }
        .header img {
            max-width: 150px;
            height: auto;
        }
        .header h1 {
            font-size: 24px;
            color: #005577;
            margin: 10px 0 5px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h4 {
            font-size: 16px;
            color: #005577;
            margin-bottom: 10px;
            border-left: 4px solid #005577;
            padding-left: 10px;
        }
        .section p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #005577;
            color: #fff;
            font-weight: bold;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .right {
            text-align: right;
        }
        .totals {
            font-size: 14px;
            font-weight: bold;
        }
        .totals p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo">
            <h1>Factura Electrónica #{{ $factura->id }}</h1>
            <p> {{ \Carbon\Carbon::parse($factura->fecha)->setTimezone('America/Managua')->format('d/m/Y H:i') ?? 'No disponible' }}</p>
            <p>Empresa: Tu Empresa S.A. | RUC: 123456789 | Dirección: Managua, Nicaragua</p>
        </div>

        <div class="section">
            <h4>Cliente</h4>
            <p><strong>Nombre:</strong> {{ $factura->cliente->nombre ?? 'N/A' }}</p>
            <p><strong>Cédula:</strong> {{ $factura->cliente->cedula ?? 'N/A' }}</p>
            <p><strong>Celular:</strong> {{ $factura->cliente->celular ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <h4>Vendedor</h4>
            <p><strong>Nombre:</strong> {{ $factura->usuario->nombre ?? 'N/A' }}</p>
            <p><strong>Cédula:</strong> {{ $factura->usuario->cedula ?? 'N/A' }}</p>
        </div>

        <div class="section">
            <h4>Detalle de Productos</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cant</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factura->productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td class="right">{{ $producto->pivot->cantidad }}</td>
                            <td class="right">C$ {{ number_format($producto->pivot->precio, 2) }}</td>
                            <td class="right">{{ $producto->pivot->descuento }}%</td>
                            <td class="right">C$ {{ number_format($producto->pivot->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="section right totals">
            <p><strong>Subtotal:</strong> C$ {{ number_format($subtotal, 2) }}</p>
            <p><strong>IVA:</strong> C$ {{ number_format($factura->iva, 2) }}</p>
            <p><strong>Total:</strong> C$ {{ number_format($factura->total, 2) }}</p>
            <p><strong>Monto Recibido:</strong> C$ {{ number_format($factura->monto_recibido, 2) }}</p>
            <p><strong>Vuelto:</strong> C$ {{ number_format($factura->vuelto, 2) }}</p>
        </div>

        <div class="footer">
            <p>Gracias por su compra | Generado por Tu Empresa S.A.</p>
            <p>Contacto: info@tuempresa.com | Tel: +505 1234-5678</p>
        </div>
    </div>
</body>
</html>