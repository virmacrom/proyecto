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
    public function paacientes(){
        return $this->belongsToMany('App\Paciente');
    }
}

