<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelo_tkt_definitivo extends Model
{
    protected $table ="ticket"; 
    protected $fillable = ['tn,title,queue_id,ticket_state_id,customer_id']
}
