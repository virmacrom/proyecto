<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Respuestas;
use App\respuestas_elegidas;
use App\RespuestasElegidas;
use Illuminate\Http\Request;

class RespuestasElegidasController extends Controller
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
        $respuestaselegidas= RespuestasElegidas::all();
        return view('respuestaselegidas/index',['respuestas'=>$respuestaselegidas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $encuestas= Encuesta::all()->pluck('name','id');
        $respuestas = Respuestas::all()->pluck('full_name','id');

        return view('respuestaselegidas/create',['encuestas'=>$encuestas,'respuestas'=>$respuestas]);

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

            'encuesta_id' => 'required|exits:encuestas,id',
            'respuesta_id'=>'required|exits:respuestas,id',

        ]);

        $respuesta_elegida = new RespuestasElegidas($request->all());
        $respuesta_elegida->save();


        flash('Respuesta Elegida creada correctamente');

        return redirect()->route('respuestaselegidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function show(respuestas_elegidas $respuestas_elegidas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function edit(respuestas_elegidas $respuestas_elegidas)
    {
        $respuestas_elegidas = RespuestasElegidas::find($respuestas_elegidas);

        $encuestas = Encuesta::all()->pluck('full_name','id');

        $respuestas = Respuestas::all()->pluck('full_name','id');


        return view('respuestas_elegidas/edit',['respuesta_elegida'=> $respuestas_elegidas, 'encuestas'=>$encuestas, 'respuestas'=>$respuestas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, respuestas_elegidas $respuestas_elegidas)
    {
        $this->validate($request, [

            'encuesta_id' => 'required|exits:encuestas,id',
            'respuesta_id'=>'required|exits:respuestas,id',



        ]);
        $respuestas_elegidas = RespuestasElegidas::find($respuestas_elegidas);
        $respuestas_elegidas->fill($request->all());

        $respuestas_elegidas->save();

        flash('Respuestas Elegidas modificada correctamente');

        return redirect()->route('respuestas_elegidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuestas_elegidas $respuestas_elegidas)
    {
        $respuestas_elegidas = RespuestasElegidas::find($respuestas_elegidas);
        $respuestas_elegidas->delete();
        flash('Respuestas elegidas borrada correctamente');

        return redirect()->route('respuestas_elegidas.index');
    }
}
