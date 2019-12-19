<?php

namespace App\Http\Controllers;

use App\Aseguradora;
use Illuminate\Http\Request;

class AseguradoraController extends Controller
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
        $aseguradoras = Aseguradora::paginate(5);

        return view('aseguradoras/index')->with('aseguradoras', $aseguradoras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'aseguradoras/create');
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
            'name' => 'required|max:255',
        ]);

        //
        $aseguradora = new Aseguradora($request->all());
        $aseguradora->save();

        // return redirect('aseguradoras');

        flash('Aseguradora creada correctamente');

        return redirect()->route('aseguradoras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aseguradora  $aseguradora
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

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
        $aseguradora = Aseguradora::find($id);

        return view('aseguradoras/edit')->with('aseguradora', $aseguradora);
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
            'name' => 'required|max:255',
        ]);

        $aseguradora = Aseguradora::find($id);
        $aseguradora->fill($request->all());

        $aseguradora->save();

        flash('Aseguradora modificada correctamente');

        return redirect()->route('aseguradoras.index');
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
        $aseguradora = Aseguradora::find($id);
        $aseguradora->delete();
        flash('Aseguradora borrada correctamente');

        return redirect()->route('aseguradoras.index');
    }

    public function destroyAll()
    {
        Aseguradora::truncate();
        flash('Todas las aseguradoras borradas correctamente');

        return redirect()->route('aseguradoras.index');
    }
}
