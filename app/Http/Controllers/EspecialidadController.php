<?php

namespace App\Http\Controllers;

use App\especialidad;
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
        $especialidades = especialidad::all();

        return view('especialidades/index')->with('especialidades', $especialidades);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades/create');
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
            'medico_cabecera' => 'required|max:255',
            'medico_especialista' => 'required|max:255'
        ]);

        //
        $especialidad = new especialidad($request->all());
        $especialidad->save();

        // return redirect('especialidades');

        flash('Especialidad creada correctamente');

        return redirect()->route('especialidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidad = especialidad::find($id);

        return view('especialidades/edit')->with('especialidad', $especialidad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'medico_cabecera' => 'required|max:255',
            'medico_especialista' => 'required|max:255'
        ]);

        $especialidad = especialidad::find($id);
        $especialidad->fill($request->all());

        $especialidad->save();

        flash('Especialidad modificada correctamente');

        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\especialidad  $especialidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = especialidad::find($id);
        $especialidad->delete();
        flash('Especialidad borrada correctamente');

        return redirect()->route('especialidades.index');
    }

    public function destroyAll()
    {
        especialidad::truncate();
        flash('Todas las especialidades borradas correctamente');

        return redirect()->route('especialidades.index');
    }
}