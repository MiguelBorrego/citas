<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
    protected $fillable = ['hospital','ciudad','direccion'];
    #Añadir unidad hospitalaria en un futuro como id_hospital
    //
    public function citas()
    {
        return $this->hasMany('App\Cita');
    }
}