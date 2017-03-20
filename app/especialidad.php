<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class especialidad extends Model
{
    //
    public function medico(){
        return $this->hasMany('App/medico');
    }
}
