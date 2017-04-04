<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['name','surname','dni','nuhsa'];

    public function encuestas(){
        return $this->hasMany('App/Encuesta');
    }
    public function medicos(){
        return $this->belongsToMany('App\Medico');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }

    public function enfermedades(){
        return $this->belongsToMany('App\Enfermedad');
    }

}
