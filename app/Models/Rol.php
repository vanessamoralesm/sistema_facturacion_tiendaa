<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = true; // usualmente id es auto-incremental
    protected $keyType = 'int';

    protected $fillable = ['tipo'];
    public function usuarios()
    {
        // FK en usuarios es 'rol_id', PK en roles es 'id'
        return $this->hasMany(Usuario::class, 'rol_id', 'id');
    }
}
