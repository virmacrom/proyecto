<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestas extends Model
{
    protected $fillable = ['text', 'pregunta_id'];

    public function pregunta(){
        return $this->belongsTo('App\Pregunta');
    }
  //anadido esto
    public function encuesta(){
        return $this->belongsTo('App\Encuesta');
    }

}
