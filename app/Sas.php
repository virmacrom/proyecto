<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sas extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }

    public function enfermedades(){
        return $this->hasMany('App\Enfermedad');
    }

    public function especialidades(){
        return $this->hasMany('App\Especialidad');
    }
}
