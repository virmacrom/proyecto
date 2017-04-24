<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
     public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }


    public function tipoEncuesta(){
            return $this->belongsTo('App\TipoEncuesta');
    }

}
