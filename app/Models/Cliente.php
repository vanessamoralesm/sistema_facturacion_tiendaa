<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['cedula', 'nombre', 'correo', 'direccion', 'telefono'];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cedula_cliente', 'cedula');
    }
}
