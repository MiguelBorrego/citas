<?php

namespace App\Http\Controllers;

use App\Aseguradora;
use App\Especialidad;
use App\Tratamiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Enfermedad;
use App\Paciente;
use App\Cita;

use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
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
        //

        $pacientes = Paciente::paginate(5);

        $especialidades = Especialidad::all();

        return view('pacientes/index',['pacientes'=>$pacientes,'especialidades'=>$especialidades]);
    }

    public function indexBusqueda(Request $request)
    {
        //

        $especialidades = Especialidad::all();

        if($request->especialidad_id==null){


            $pacientesId = collect([]);
            $pacientes=Paciente::all();

            foreach ($pacientes as $paciente){

                if($request->fullname == null){
                    $pacientesId->push($paciente->id);

                }elseif(str_contains($paciente->fullname,$request->fullname)) {
                    $pacientesId->push($paciente->id);
                }
            }

        }else {

            $enfermedades = Enfermedad::all()->where('especialidad_id', $request->especialidad_id);
            $pacientesId = collect([]);


            foreach ($enfermedades as $enfermedad) {
                $pacientes = $enfermedad->pacientes;

                foreach ($pacientes as $paciente) {

                    if($request->fullname == null){
                        $pacientesId->push($paciente->id);
                    }elseif(str_contains($paciente->fullname,$request->fullname)) {
                        $pacientesId->push($paciente->id);
                    }
                }

            }
        }
        $pacientesTotal = Paciente::whereIn('id',$pacientesId)->paginate(5);

        return view('pacientes/index',['pacientes'=>$pacientesTotal,'especialidades'=>$especialidades]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aseguradoras = Aseguradora::all();
        $enfermedades = Enfermedad::all();

        return view('pacientes/create',['aseguradoras'=>$aseguradoras, 'enfermedades'=>$enfermedades]);

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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255'
        ]);

        $paciente = new Paciente($request->all());
        if($paciente->aseguradora_id==null) $paciente->aseguradora_id = null;
        if($paciente->enfermedad_id==null) $paciente->enfermedad_id = null;
        $paciente->save();

        // return redirect('especialidades');

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);
        $nombrepaciente = $paciente->getFullNameAttribute();

        $citas = Cita::where('fecha_hora','>=',Carbon::now())->where('paciente_id',$id)->paginate(5);

        return view('pacientes/show',['nombrepaciente'=> $nombrepaciente,'id'=>$id, 'citas'=> $citas,'todas'=>false ]);
    }

    public function showAll($id)
    {
        $paciente = Paciente::find($id);
        $nombrepaciente = $paciente->getFullNameAttribute();

        $citas = Cita::where('paciente_id',$id)->paginate(5);

        return view('pacientes/show',['nombrepaciente'=> $nombrepaciente,'id'=>$id, 'citas'=> $citas,'todas'=>true ]);
    }

    public function show2($id)
    {
        $paciente = Paciente::find($id);
        $nombrepaciente = $paciente->getFullNameAttribute();

        $citas = $paciente->citas;
        $citas_id = collect([]);

        foreach ($citas as $cita){
            $citas_id->push($cita->id);
        }

        $tratamientos = Tratamiento::whereIn('cita_id', $citas_id)->where('fecha_final', '>=', Carbon::now())->paginate(5);


        return view('pacientes/show2',['nombrepaciente'=> $nombrepaciente,'id'=>$id,'tratamientos'=> $tratamientos,'todos'=>false]);
    }

    public function show2All($id)
    {
        $paciente = Paciente::find($id);
        $nombrepaciente = $paciente->getFullNameAttribute();

        $citas = $paciente->citas;
        $citas_id = collect([]);

        foreach ($citas as $cita){
            $citas_id->push($cita->id);
        }

        $tratamientos = Tratamiento::whereIn('cita_id', $citas_id)->paginate(5);


        return view('pacientes/show2',['nombrepaciente'=> $nombrepaciente,'id'=>$id,'tratamientos'=> $tratamientos,'todos'=>true]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);

        $aseguradoras = Aseguradora::all();
        $enfermedades = Enfermedad::all();

        return view('pacientes/edit',['paciente'=> $paciente, 'aseguradoras'=> $aseguradoras, 'enfermedades'=> $enfermedades]);
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:255'
        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());
        if($paciente->aseguradora_id==null) $paciente->aseguradora_id = null;
        if($paciente->enfermedad_id==null) $paciente->enfermedad_id = null;
        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
