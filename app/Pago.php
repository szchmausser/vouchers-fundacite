<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    
    //La tabla que contiene la clave externa "pertenece/belongsTo" a un registro en otra tabla.
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    
    public function concepto()
    {
        return $this->belongsTo(Concepto::class);
    }
}
