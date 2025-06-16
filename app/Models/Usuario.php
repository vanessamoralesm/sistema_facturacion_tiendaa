<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Factura;
use App\Models\Rol;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'cedula',
        'nombre',
        'email',
        'password',
        'rol_id',
    ];

    // También debes asegurarte que la clave primaria sea 'cedula' si lo usas como ID:
    protected $primaryKey = 'cedula';
    public $incrementing = false; // si la cedula no es auto-incremental
    protected $keyType = 'string';

    // Relación con Rol: la FK en usuarios es 'rol_id', la PK en roles es 'id'
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cedula_usuario', 'cedula');
    }
}
