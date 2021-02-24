<?php

namespace App\Models\Catalogos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cat_Proveedores extends Model
{
    protected $table = 'Cat_Proveedores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'rfc',
        'dom_fiscal',
        'telefono',
        'giro',
        'tipo_persona',
    ];
}


