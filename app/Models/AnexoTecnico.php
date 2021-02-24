<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AnexoTecnico extends Model
{
    protected $table = 'anexo_tecnicos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_partida',
        'descripcion',
        'esp_tec',
        'unidad_medida',
        'precio_sondeo',
    ];
}


