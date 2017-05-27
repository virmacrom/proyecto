<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Encuesta extends Model
{
    protected $fillable = ['tipoencuesta_id','paciente_id'];  //'medico_id','paciente_id',

    public function tipoencuesta(){
        return $this->belongsTo('App\TipoEncuesta');
    }
    public function medicos(){
        return $this->belongsTo('App\Medico');
    }

    public function pacientes(){
        return $this->belongsTo('App\Paciente');
    }
    public function respuestaselegidas(){
        return $this->hasMany('App\RespuestasElegidas');
    }

    public function getFullnameAttribute(){
        return $this->tipoencuesta->fullname . ' ' . $this->paciente->fullname;
    }

}
