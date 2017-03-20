<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    public function pacientes(){
        return $this->belongsToMany('App\paciente');
    }
}
