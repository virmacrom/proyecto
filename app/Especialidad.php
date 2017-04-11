<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //
    public function medico(){
        return $this->hasMany('App/Medico');
    }

    public function enfermedad(){
        return $this->hasMany('App/Enfermedad');
    }
}
