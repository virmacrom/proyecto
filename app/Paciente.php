<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $fillable = ['name','surname','user_id','dni','nuhsa'];

    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }
    public function medicos(){
        return $this->belongsToMany('App\Medico');
    }

    public function citas()
    {
        return $this->hasMany('App\Cita');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function enfermedades(){
        return $this->belongsToMany('App\Enfermedad');
    }

    public function getFullnameAttribute(){
        return $this->user->name . ' ' . $this->user->surname;
    }

}
