<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Enfermedad;
use App\Sas;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
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

        $especialidades = Especialidad::all();
//        $sas = Sas::all();

        return view('especialidades/index')->with('especialidades', $especialidades);
//['sas'=>$sas]

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $sas = Sas::all()->pluck('name','id');
        return view('especialidades/create');  //,['sas'=>$sas]

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'sas_id' => 'required|exists:sas,id',
        ]);

        //
        $especialidad = new Especialidad($request->all());
        $especialidad->save();

        // return redirect('especialidades');

        flash('Especialidad creada correctamente');

        return redirect()->route('especialidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $especialidad = Especialidad::find($id);
        //$sas = Sas::all()->pluck('name','id');

        return view('especialidades/edit')->with('especialidad', $especialidad);  //, ['sas'=>$sas]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'sas_id' => 'required|exists:sas,id',
        ]);

        $especialidad = Especialidad::find($id);
        $especialidad->fill($request->all());

        $especialidad->save();

        flash('Especialidad modificada correctamente');

        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::find($id);
        $especialidad->delete();
        flash('Especialidad borrada correctamente');

        return redirect()->route('especialidades.index');
    }

    public function destroyAll()
    {
        Especialidad::truncate();
        flash('Todas las especialidades borradas correctamente');

        return redirect()->route('especialidades.index');
    }

}
