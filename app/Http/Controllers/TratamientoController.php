<?php


namespace App\Http\Controllers;

use App\MedicamentoTratamiento;
use Illuminate\Http\Request;
use App\Tratamiento;
use App\Cita;

class TratamientoController extends Controller
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
        $tratamientos = Tratamiento::paginate(5);

        return view('tratamientos/index',['tratamientos'=>$tratamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $citas = Cita::all();


        return view('tratamientos/create',['citas'=>$citas]);
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
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicial',
            'descripcion' => 'required|max:255',
            'cita_id' => 'required|exists:citas,id'

        ]);

        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();


        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tratamiento = Tratamiento::find($id);

        $medicamento_tratamientos = $tratamiento->medicamento_tratamientos;

        return view('tratamientos/show',['tratamiento'=> $tratamiento, 'medicamento_tratamientos'=>$medicamento_tratamientos]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tratamiento = Tratamiento::find($id);

        $citas = Cita::all();


        return view('tratamientos/edit',['tratamiento'=> $tratamiento, 'citas'=>$citas]);
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
            'fecha_inicial' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicial',
            'descripcion' => 'required|max:255',
            'cita_id' => 'required|exists:citas,id'

        ]);
        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());

        $tratamiento->save();

        flash('Tratamiento modificado correctamente');

        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('tratamientos.index');
    }


}