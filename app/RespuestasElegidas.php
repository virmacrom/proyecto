<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestasElegidas extends Model
{
    public function encuesta(){
        return $this->belongsTo('App\Encuesta');
    }


    //anadido esto
    public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }
}
