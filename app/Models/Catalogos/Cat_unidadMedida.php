<?php

namespace App\Models\Catalogos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cat_unidadMedida extends Model
{
    protected $table = 'Cat_unidad_medidas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'descripcion',
        'activo',
    ];
}
