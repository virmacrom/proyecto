<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Tipoencuesta;
use App\Pregunta;
use App\Medico;
use App\Paciente;
use App\Respuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $encuestas = Encuesta::all();
      $tipoencuestas = Tipoencuesta::all();//->pluck('name','id');
        if($request->ajax()){
            return response()->json([
                'data'=>$encuestas,
                'data1'=>$tipoencuestas,
            ]);
        }
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
      // $preguntas= Preguntas::all()->pluck('text','id');


        return view('encuestas/create',['tipoencuesta'=>$tipoencuesta]);//'medicos'=>$medicos, 'pacientes'=>$pacientes,[
       //'preguntas'=>$preguntas
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
           'tipoencuesta_id' => 'exists:tipoencuestas,id',
           // 'medico_id'=>'required|exists:medicos,id',
            //'paciente_id'=>'required|exists:pacientes,id',
            'respuesta_id'=>'exists:respuestas,id',

       ]);

        $encuesta = new Encuesta($request->all());
       // $encuesta->save();


        flash('Encuesta creada correctamente');

        return redirect()->route('encuestas.indexformulario');  //formulario
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $encuestas = Encuesta::all();
        $tipoencuestas = Tipoencuesta::find($id);
        return view('encuestas/indexformulario',['encuestas'=>$encuestas,'tipoencuestas'=>$tipoencuestas]);

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
            'tipoencuesta_id' => 'exists:tipoencuestas,id',
          //  'medico_id'=>'required|exists:medicos,id',
         //   'paciente_id'=>'required|exists:pacientes,id',
            'respuesta_id'=>'exists:respuestas,id',


        ]);
        $encuesta = Encuesta::find($id);
        $encuesta->fill($request->all());
      //  $encuesta->tipoencuesta_id = TipoEncuesta::tipoencuesta()->tipoencuesta->id;

        flash('Encuesta modificada correctamente');

        return redirect()->route('encuestas.indexformulario');  //formulario
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

    public function destroyAll(Request $request)
    {
        Encuesta::truncate();
        $message='Encuestas borradas correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('encuestas.index'); }

    public function createConTipoEncuesta($id){
        $tipoencuesta = Tipoencuesta::find($id);
        //dd($tipoencuesta);
        return view('encuestas/create',['tipoencuesta'=>$tipoencuesta]);
    }

   public function indexformulario(){
       // $encuestas=Encuesta::all();
        $tipoencuestas = Tipoencuesta::all();//pluck('name', 'id');
      // dd($tipoencuesta);
        return view('encuestas/indexformulario',['tipoencuestas'=>$tipoencuestas]);

    }
}
