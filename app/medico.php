<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
    //
    protected $fillable = ['nombre','apellidos','id'];

    public function encuestas(){
        return $this->hasMany('App/Encuesta');
    }
    public function pacientes(){
        return $this->belongsToMany('App\Paciente');
    }

    public function especialidad(){
        return $this->belongsTo('App/Especialidad');
    }
}

