<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['fecha_hora','duracion','localizacion_id', 'medico_id', 'paciente_id'];


    public function getTiempoFinalAttribute()
    {
        $fecha_inicial = $this->fecha_hora;
        $duracion = $this->duracion;

        $nuevafecha = strtotime ( $fecha_inicial );

        $i = 0;

        while($i < $duracion){
            $nuevafecha = strtotime ( '+1 minute' , $nuevafecha ) ;
            $i++;
        }

        $fecha_final = date ( 'Y-m-d H:i:s' , $nuevafecha );

        return $fecha_final;
    }

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function tratamientos()
    {
        return $this->hasMany('App\Tratamiento');
    }

    public function localizacion()
    {
        return $this->belongsTo('App\Localizacion');
    }
}
