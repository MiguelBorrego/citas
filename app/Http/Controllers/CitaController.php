<?php

namespace App\Http\Controllers;

use App\Localizacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;


class CitaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::paginate(5);

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all();

        $pacientes = Paciente::all();

        $localizaciones = Localizacion::all();


        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'localizaciones'=>$localizaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'duracion' => 'required|max:200',
            'localizacion_id' => 'required|exists:localizacions,id'

        ]);
        $cita = new Cita($request->all());

        if ($cita-> paciente-> enfermedad_id == null or $cita-> medico-> especialidad_id == $cita-> paciente-> enfermedad->especialidad_id){
            //$fecha_inicio = Carbon::parse($cita->fecha_hora);
            $cita->hora_final = $cita->tiempo_final;
            //$fecha_inicio->addMinutes($cita->duracion);

            $cita->save();


            flash('Cita creada correctamente');

            return redirect()->route('citas.index');

    }
        else{
            flash('La especialidad del médico no es adecuada');

            return redirect()->route('citas.create');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);

        $tratamientos= $cita->tratamientos;

        return view('citas/show',['cita'=>$cita,'tratamientos'=>$tratamientos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all();

        $pacientes = Paciente::all();

        $localizaciones = Localizacion::all();


        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes, 'localizaciones'=>$localizaciones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'duracion' => 'required|max:200',
            'localizacion_id' => 'required|exists:localizacions,id'

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());

        //$fecha_inicio = Carbon::parse($cita->fecha_hora);
        $cita->hora_final = $cita->tiempo_final;
        //$fecha_inicio->addMinutes($cita->duracion);

        if ($cita-> paciente-> enfermedad_id == null or $cita-> medico-> especialidad_id == $cita-> paciente-> enfermedad->especialidad_id){
            //$fecha_inicio = Carbon::parse($cita->fecha_hora);
            $cita->hora_final = $cita->tiempo_final;
            //$fecha_inicio->addMinutes($cita->duracion);

            $cita->save();


            flash('Cita creada correctamente');

            return redirect()->route('citas.index');

        }
        else {
            flash('La especialidad del médico no es adecuada');

            return redirect()->route('citas.edit', ['citas' => $cita->id ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
