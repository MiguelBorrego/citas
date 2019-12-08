<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora','duracion','localizacion', 'medico_id', 'paciente_id'];

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function tratamiento()
    {
        return $this->hasMany('App\Tratamiento');
    }
}
