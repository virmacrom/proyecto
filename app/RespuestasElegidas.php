<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasElegidas extends Model
{
    public function encuestas(){
        return $this->belongsTo('App/Encuesta');
    }
}
