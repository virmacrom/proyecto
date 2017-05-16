<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sas extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
