<?php


namespace App\Http\Controllers;


use App\Medicamento;
use App\MedicamentoTratamiento;
use App\Tratamiento;

use Illuminate\Http\Request;

class Medicamento_TratamientoController extends Controller
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
        $medicamento_tratamientos=MedicamentoTratamiento::all();

        return view( 'medicamento_tratamientos/index',['medicamento_tratamientos'=>$medicamento_tratamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos = Medicamento::all();
        $tratamientos = Tratamiento::all();

        return view( 'medicamento_tratamientos/create',['medicamentos'=>$medicamentos,'tratamientos'=>$tratamientos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'unidades' => 'required',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'tratamiento_id' => 'required|exists:tratamientos,id'
        ]);

        //
        $medicamento_tratamiento = new MedicamentoTratamiento($request->all());
        $medicamento_tratamiento->save();

        flash('Medicamento asociado a tratamiento correctamente');

        return redirect()->route('medicamento_tratamientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aseguradora  $aseguradora
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicamento_tratamiento= MedicamentoTratamiento::find($id);

        $medicamento = $medicamento_tratamiento->medicamento;

        return view('medicamento_tratamientos/show',['medicamento'=>$medicamento]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aseguradora  $aseguradora
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        //
        $medicamento_tratamiento = MedicamentoTratamiento::find($id);
        $medicamentos = Medicamento::all();
        $tratamientos = Tratamiento::all();

        return view('medicamento_tratamientos/edit',['medicamento_tratamiento'=>$medicamento_tratamiento,'medicamentos'=>$medicamentos,'tratamientos'=>$tratamientos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aseguradora  $aseguradora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'unidades' => 'required',
            'frecuencia' => 'required|max:255',
            'instrucciones' => 'required|max:255',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'tratamiento_id' => 'required|exists:tratamientos,id'
        ]);

        $medicamento_tratamientos = MedicamentoTratamiento::find($id);
        $medicamento_tratamientos->fill($request->all());

        $medicamento_tratamientos->save();

        flash('Asociación medicamento con tratamiento modificado correctamente');

        return redirect()->route('medicamento_tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aseguradora  $aseguradora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $medicamento_tratamientos = MedicamentoTratamiento::find($id);
        $medicamento_tratamientos->delete();
        flash('Asociación medicamento con tratamiento borrada correctamente');

        return redirect()->route('medicamento_tratamientos.index');
    }

}