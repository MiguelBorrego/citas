<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model
{
    //
    protected $fillable = ['name'];

    public function pacientes()
    {
        return $this->hasMany('App\Paciente');
    }
}
