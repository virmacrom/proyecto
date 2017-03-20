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

    public function medico(){
        return $this->belongsTo('App/medico');
    }

    public function paciente(){
        return $this->belongsTo('App/Paciente');
    }

}
