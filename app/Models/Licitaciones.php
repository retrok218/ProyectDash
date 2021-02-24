<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Licitaciones extends Model
{
    protected $table = 'Licitaciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'numero',
        'publicacion',
        'publicacion_jab',
        'fecha_apertura',
        'fecha_fallo',
    ];
}
