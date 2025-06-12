<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;
use App\Models\ProductoFactura;


class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['nombre', 'precio', 'detalle', 'cant_disponible'];

    public function facturas()
    {
        return $this->belongsToMany(Factura::class, 'producto_factura')
                    ->using(ProductoFactura::class)
                    ->withPivot('cant_productos', 'valor_productos', 'total_por_producto');
    }
}
