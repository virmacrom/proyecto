<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //
    public function medicos(){
        return $this->hasMany('App/Medico');
    }

    public function enfermedades(){
        return $this->hasMany('App/Enfermedad');
    }
}
