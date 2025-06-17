<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Factura;
use App\Models\Rol;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    protected $fillable = ['cedula', 'nombre', 'email', 'password', 'rol_id'];
    protected $hidden = ['password', 'remember_token']; // Mantén oculto por seguridad
    protected $primaryKey = 'cedula'; // Si cedula es la clave primaria
    public $incrementing = false; // Desactiva autoincremento si usas cedula
    protected $keyType = 'string'; // Define clave como string

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Obtiene el nombre del campo utilizado para la autenticación.
     *
     * @return string
     */
    public function username()
    {
        return 'email'; // Autenticación por email
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cedula_usuario', 'cedula');
    }
}