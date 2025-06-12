<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Factura;
use App\Models\Rol;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['cedula', 'nombre', 'correo', 'password', 'rol_tipo'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_tipo', 'tipo');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cedula_usuario', 'cedula');
    }
}

