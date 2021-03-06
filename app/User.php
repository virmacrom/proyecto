<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Medico;
use App\Sas;
use App\Paciente;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'address', 'telephone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function paciente(){
        return $this->hasOne('App\Paciente');
    }

    public function medico(){
        return $this->hasOne('App\Medico');
    }
    public function sas(){
        return $this->hasOne('App\Sas');
    }


}
