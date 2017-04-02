<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['nombre','apellidos','dni','nuhsa'];

    public function encuestas(){
        return $this->hasMany('App/Encuesta');
    }
    public function medicos(){
        return $this->belongsToMany('App\medico');
    }
    public function enfermedades(){
        return $this->belongsToMany('App\Enfermedad');
    }

}
