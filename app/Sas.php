<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sas extends Model
{
    protected $fillable = ['name','surname','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }


/*
    public function enfermedades(){
        return $this->hasMany('App\Enfermedad');
    }

    public function especialidades(){
        return $this->hasMany('App\Especialidad');
    }*/
}
