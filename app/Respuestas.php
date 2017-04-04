<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    public function preguntas(){
        return $this->belongsTo('App/Pregunta');
    }

}
