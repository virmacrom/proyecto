<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
     public function respuestas(){
        return $this->belongsTo('App/respuestas');
    }


    public function tipoEncuesta(){
            return $this->belongsTo('App/TipoEncuesta');
    }

}
