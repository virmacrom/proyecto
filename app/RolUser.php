<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolUser extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }

}
