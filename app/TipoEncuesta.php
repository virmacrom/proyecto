<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEncuesta extends Model
{
    //
    public function encuestas(){
        return $this->hasMany('App\Encuesta');
    }
}
