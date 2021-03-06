<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\Tipoencuesta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
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
    public function index(Request $request)
    {
        $preguntas = Pregunta::all();
        if($request->ajax()){
            return response()->json([
                'data'=>$preguntas
            ]);
        }
        return view('preguntas/index',['preguntas'=>$preguntas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoencuesta = Tipoencuesta::all()->pluck('name','id');
        return view ('preguntas/create',['tipoencuesta'=>$tipoencuesta]);

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
            'text' => 'required|max:255',
            'tipoencuesta_id'=>'required|exists:tipoencuestas,id'
        ]);

        //
        $pregunta = new Pregunta($request->all());
        $pregunta->save();


        flash('Pregunta creada correctamente');

        return redirect()->route('preguntas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(Pregunta $pregunta)
    {
        return view('preguntas/show',['pregunta'=>$pregunta]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pregunta = Pregunta::find($id);
        $tipoencuesta = Tipoencuesta::all()->pluck('name','id');

        return view('preguntas/edit',[ 'pregunta'=>$pregunta,'tipoencuesta'=>$tipoencuesta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => 'required|max:255',
            'tipoencuesta_id'=>'required|exists:tipoencuestas,id'
        ]);

        $pregunta = Pregunta::find($id);
        $pregunta->fill($request->all());

        $pregunta->save();

        flash('Pregunta modificada correctamente');

        return redirect()->route('preguntas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $pregunta = Pregunta::find($id);
        $pregunta->delete();

        $message='Pregunta borrada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('preguntas.index');
    }
}
