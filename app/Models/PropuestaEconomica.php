<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PropuestaEconomica extends Model
{
    protected $table = 'propuesta_economicas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_licitacion',
        'id_anexo_tecnico',
        'id_proveedor',
        'oferta',
    ];
}
