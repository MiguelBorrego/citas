<?php


namespace App\Http\Controllers;



use App\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{

    /**
     * MedicamentoController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //

        $medicamentos = Medicamento::all();

        return view('medicamentos/index')->with('medicamentos', $medicamentos);
    }

    public function create()
    {
        return view('medicamentos/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_comercial' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'URL_Vademecum' => 'required|max:255'
        ]);

        //
        $medicamento = new Medicamento($request->all());
        $medicamento->save();


        flash('Medicamento creado correctamente');

        return redirect()->route('medicamentos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $medicamento = Medicamento::find($id);

        return view('medicamentos/edit')->with('medicamento', $medicamento);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre_comercial' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion' => 'required|max:255',
            'URL_Vademecum' => 'required|max:255'
        ]);

        $medicamento = Medicamento::find($id);
        $medicamento->fill($request->all());

        $medicamento->save();

        flash('Medicamento modificado correctamente');

        return redirect()->route('medicamentos.index');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::find($id);
        $medicamento->delete();
        flash('Medicamento borrado correctamente');

        return redirect()->route('medicamentos.index');
    }

    public function destroyAll()
    {
        Medicamento::truncate();
        flash('Todos los medicamentos borrados correctamente');

        return redirect()->route('medicamentos.index');
    }

}