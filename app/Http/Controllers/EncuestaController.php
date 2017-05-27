<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Tipoencuesta;
use App\Pregunta;
use App\Medico;
use App\Paciente;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $encuestas = Encuesta::all();
      $tipoencuestas = Tipoencuesta::all();
        return view('encuestas/index',['encuestas'=>$encuestas,'tipoencuestas'=>$tipoencuestas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //  $medicos = Medico::all()->pluck('code','id');
       // $pacientes = Paciente::all()->pluck('nuhsa','id');
       $tipoencuesta = Tipoencuesta::all()->pluck('name','id');
       $preguntas= Preguntas::all()->pluck('name','id');


        return view('encuestas/create',['tipoencuesta'=>$tipoencuesta,'preguntas'=>$preguntas]);//'medicos'=>$medicos, 'pacientes'=>$pacientes,[
       // 'tipoencuesta'=>$tipoencuesta]
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
           // 'name' => 'required|max:255',
           'tipoencuesta_id' => 'required|exists:tipoencuestas,id',
           // 'medico_id'=>'required|exists:medicos,id',
            //'paciente_id'=>'required|exists:pacientes,id',

       ]);

        $encuesta = new Encuesta($request->all());

       // $encuesta->tipoencuesta_id = TipoEncuesta::tipoencuesta()->tipoencuesta->id;

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

     //   $medicos = Medico::all()->pluck('code','id');

       // $pacientes = Paciente::all()->pluck('nuhsa','id');

     $tipoencuesta = Tipoencuesta::all()->pluck('name','id');



        return view('encuestas/edit',['encuesta'=> $encuesta, 'tipoencuesta'=>$tipoencuesta]);//, 'medicos'=>$medicos, 'pacientes'=>$pacientes
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
           // 'name' => 'required|max:255',
            'tipoencuesta_id' => 'required|exists:tipoencuestas,id',
          //  'medico_id'=>'required|exists:medicos,id',
         //   'paciente_id'=>'required|exists:pacientes,id',



        ]);
        $encuesta = Encuesta::find($id);
        $encuesta->fill($request->all());
      //  $encuesta->tipoencuesta_id = TipoEncuesta::tipoencuesta()->tipoencuesta->id;

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

    public function destroyAll()
    {
        Encuesta::truncate();
        flash('Todas las encuestas borradas correctamente');

        return redirect()->route('encuestas.index');
    }

    public function createConTipoEncuesta($id){
        $tipoencuesta = Tipoencuesta::find($id);
        $pregunta = Pregunta:: find($id);
        //dd($tipoencuesta);
        return view('encuestas/create',['tipoencuesta'=>$tipoencuesta, 'pregunta'=>$pregunta]);
    }
}
