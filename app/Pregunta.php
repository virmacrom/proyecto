<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = ['text', 'tipoencuesta_id','respuestas_id'];

     public function respuestas(){
        return $this->hasMany('App\Respuestas');
    }


    public function tipoEncuesta(){
            return $this->belongsTo('App\TipoEncuesta');
    }

}
