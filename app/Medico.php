<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{

    protected $fillable = ['user_id','especialidad_id'];

    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }
    public function pacientes(){
        return $this->belongsToMany('App\Paciente');
    }

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function especialidad(){
        return $this->belongsTo('App\Especialidad');
    }

    public function getFullnameAttribute(){
        return $this->user->name . ' ' . $this->user->surname . ' - ' . $this->especialidad->name;
    }

}

