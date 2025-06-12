<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Rol extends Model
{
    use HasFactory;

    protected $primaryKey = 'tipo';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;


    protected $table = 'roles'; // <-- aquí corregimos el nombre de la tabla
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_tipo', 'tipo');
    }
}
