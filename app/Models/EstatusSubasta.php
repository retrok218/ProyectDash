<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstatusSubasta extends Model
{
    protected $table = 'estatus_subastas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_licitacion',
        'id_subasta',
        'estatus',
        'vuelta',
    ];
}



