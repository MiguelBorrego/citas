<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $fillable = ['fecha_inicial','fecha_final','descripcion', 'cita_id'];

    public function cita()
    {
        return $this->belongsTo('App\Cita');
    }

    /*
    public function medicamento_tratamiento()
    {
        return $this->hasMany('App\Medicamento_Tratamiento');
    }
    */
}