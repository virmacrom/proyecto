<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    public function pacientes(){
        return $this->belongsToMany('App\Paciente');
    }
    public function especialidad(){
        return $this->belongsTo('App\Especialidad');
    }

    public function sas(){
        return $this->belongsTo('App\Sas');
    }

}
