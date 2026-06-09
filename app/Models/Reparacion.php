<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    protected $table = 'reparaciones';

    protected $fillable = [
        'nombre_cliente',
        'marca',
        'modelo',
        'descripcion_falla',
        'fecha_ingreso',
        'estado',
    ];
}
