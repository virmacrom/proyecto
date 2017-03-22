<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestas_elegidas extends Model
{
    public function encuestas(){
        return $this->belongsTo('App/Encuesta');
    }
}
