<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Especialidad;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Medico;

class MedicoController extends Controller
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
        $medicos = Medico::paginate(5);

        return view('medicos/index',['medicos'=>$medicos]);

    }

    public function indexBusqueda(Request $request)
    {
        $medicos = Medico::all();
        $medicosId = collect([]);

        foreach ($medicos as $medico) {
            if($request->fullname==null){
                $medicosId->push($medico->id);
            }elseif (str_contains($medico->fullname, $request->fullname)) {
                $medicosId->push($medico->id);
            }
        }

        $medicosTotal=Medico::whereIn('id',$medicosId)->paginate(5);

        return view('medicos/index',['medicos'=>$medicosTotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('medicos/create',['especialidades'=>$especialidades]);

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
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);
        $medico = new Medico($request->all());
        $medico->save();

        // return redirect('especialidades');

        flash('Medico creado correctamente');

        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);
        $nombremedico = $medico->getFullNameAttribute();

        $citas = Cita::where('fecha_hora','>=',Carbon::now())->where('medico_id',$id)->paginate(5);

        return view('medicos/show',['nombremedico'=> $nombremedico,'id'=>$id, 'citas'=> $citas,'todas'=>false ]);
    }

    public function showAll($id)
    {
        $medico = Medico::find($id);
        $nombremedico = $medico->getFullNameAttribute();

        $citas = Cita::where('medico_id',$id)->paginate(5);

        return view('medicos/show',['nombremedico'=> $nombremedico,'id'=>$id, 'citas'=> $citas,'todas'=>true ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $medico = Medico::find($id);

        $especialidades = Especialidad::all()->pluck('name','id');

        return view('medicos/edit',['medico'=> $medico, 'especialidades'=>$especialidades ]);
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
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();

        flash('Medico modificado correctamente');

        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();
        flash('Medico borrado correctamente');

        return redirect()->route('medicos.index');
    }
}
