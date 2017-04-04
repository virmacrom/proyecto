<?php

namespace App\Http\Controllers;

use App\Pregunta;
use App\respuestas;
use Illuminate\Http\Request;

class RespuestasController extends Controller
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
        $respuestas= Respuestas::all();
        return view('respuestas/index',['respuestas'=>$respuestas]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $preguntas= Pregunta::all()->pluck('text');
        return view('respuestas/create',['preguntas'=>$preguntas]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'respuesta'=>'required|max:255',
            'pregunta_id'=>'required|exists:preguntas,id'
        ]);
        $respuesta= new respuestas($request->all());
        $respuesta->save();

        flash('Respuesta creado correctamente');
        return redirect()->route('respuestas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('respuestas/show',['respuesta'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = Respuestas::find($id);

        $preguntas = Pregunta::all()->pluck('full_text');

        return view('respuestas/edit',['respuesta'=> $respuesta, 'preguntas'=>$preguntas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'respuesta'=>'required|max:255',
            'pregunta_id'=>'required|exists:preguntas,id'

        ]);
        $respuesta = Respuestas::find($id);
        $respuesta->fill($request->all());

        $respuesta->save();

        flash('Respuesta modificada correctamente');

        return redirect()->route('respuestas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $respuesta = Respuestas::find($id);
        $respuesta->delete();
        flash('respuesta borrada correctamente');

        return redirect()->route('respuestas.index');
    }
}
