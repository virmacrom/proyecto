<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{

    protected $fillable = ['name'];  //,'sas_id'
    public function medicos(){
        return $this->hasMany('App\Medico');
    }

    public function enfermedades(){
        return $this->hasMany('App\Enfermedad');
    }

    /*public function sas(){
        return $this->belongsTo('App\Sas');
    }*/


}
