<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['name', 'id_tipoencuesta'];

     public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }


    public function tipoEncuesta(){
            return $this->belongsTo('App\TipoEncuesta');
    }

}
