<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    public function preguntas(){
        return $this->hasMany('App/Pregunta');
    }

}
