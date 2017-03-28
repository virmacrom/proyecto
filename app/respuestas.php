<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    public function preguntas(){
        return $this->belongsTo('App/Pregunta');
    }

}
