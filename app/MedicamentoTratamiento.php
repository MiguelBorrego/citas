<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicamentoTratamiento extends Model
{

    protected $fillable = ['unidades','frecuencia','instrucciones', 'medicamento_id', 'tratamiento_id'];

    public function medicamento()
    {
        return $this->belongsTo('App\Medicamento');
    }

    public function tratamiento()
    {
        return $this->belongsTo('App\Tratamiento');
    }

}