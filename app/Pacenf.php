<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacenf extends Model
{
    protected $fillable = ['enfermedad_id', 'paciente_id'];

    public function enfermedad()
    {
        return $this->belongsTo('App\Enfermedad');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

}