<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\ProductoFactura;


class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $fillable = ['fecha', 'monto', 'cedula_usuario', 'cedula_cliente'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'cedula_usuario', 'cedula');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cedula_cliente', 'cedula');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_factura')
                    ->using(ProductoFactura::class) // es para la tabla intermedia
                    ->withPivot('cant_productos', 'valor_productos', 'total_por_producto');
    }
}
