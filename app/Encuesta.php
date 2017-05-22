<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Encuesta extends Model
{

    public function tipoencuesta(){
        return $this->belongsTo('App\TipoEncuesta');
    }

    public function medico(){
        return $this->belongsTo('App\Medico');
    }

    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    public function respuestaselegidas(){
        return $this->hasMany('App\RespuestasElegidas');
    }



}
