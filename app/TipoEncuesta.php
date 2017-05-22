<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEncuesta extends Model
{
    protected $fillable = ['name'];

    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }

    public function preguntas(){
        return $this->hasMany('App\Pregunta');
    }
}
