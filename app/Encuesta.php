<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Encuesta extends Model
{
    //
    public function tipoencuestas(){
        return $this->belongsTo('App\TipoEncuesta');
    }

}
