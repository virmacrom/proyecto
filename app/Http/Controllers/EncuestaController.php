<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\TipoEncuesta;
use App\Sas;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;

class EncuestaController extends Controller
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
        $encuestas = Encuesta::all();

        return view('encuestas/index',['encuestas'=>$encuestas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('name','id');

        $pacientes = Paciente::all()->pluck('name','id');

        $tipoencuesta = TipoEncuesta::all()->pluck('name','id');

        return view('encuestas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'tipoencuesta'=>$tipoencuesta]);
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
            'tipoencuesta_id' => 'required|exits:tipoencuestas,id',
            'medico_id'=>'required|exits:medicos,id',
            'paciente_id'=>'required|exits:pacientes,id',

        ]);

        $encuesta = new Encuesta($request->all());
        $encuesta->save();


        flash('Encuesta creada correctamente');

        return redirect()->route('encuestas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $encuesta = Encuesta::find($id);

        $medicos = Medico::all()->pluck('name','id');

        $pacientes = Paciente::all()->pluck('name','id');



        $tipoencuesta = TipoEncuesta::all()->pluck('name','id');

        return view('encuestas/edit',['encuesta'=> $encuesta, 'medicos'=>$medicos, 'pacientes'=>$pacientes, 'tipoencuesta'=>$tipoencuesta]);
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
            'tipoencuesta_id' => 'required|exits:tipoencuestas,id',
            'medico_id'=>'required|exits:medicos,id',
            'paciente_id'=>'required|exits:pacientes,id',



        ]);
        $encuesta = Encuesta::find($id);
        $encuesta->fill($request->all());

        $encuesta->save();

        flash('Encuesta modificada correctamente');

        return redirect()->route('encuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        flash('Encuesta borrada correctamente');

        return redirect()->route('encuestas.index');
    }
}
