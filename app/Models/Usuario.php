<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Factura;
use App\Models\Rol;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['cedula', 'nombre', 'email', 'password', 'rol_tipo'];
    protected $hidden = ['password','remember_token',];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_tipo', 'tipo');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cedula_usuario', 'cedula');
    }
}
