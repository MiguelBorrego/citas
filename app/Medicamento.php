<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    //
    protected $fillable=['nombre_comercial','composicion','presentacion','URL_Vademecum'];


    public function medicamento_tratamientos(){

        return $this->hasMany('App\MedicamentoTratamiento');
    }

}
