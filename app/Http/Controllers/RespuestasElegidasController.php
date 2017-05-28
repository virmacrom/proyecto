<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\Respuestas;

use App\Respuestaselegidas;
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
        $respuestaselegidas= Respuestaselegidas::all();
        return view('respuestaselegidas/index',['respuestaselegidas'=>$respuestaselegidas]);
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

        $respuestaselegida = new Respuestaselegidas($request->all());
        $respuestaselegida->save();


        flash('Respuesta Elegida creada correctamente');

        return redirect()->route('respuestaselegidas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function edit(respuestaselegidas $respuestaselegidas)
    {
        $respuestaselegidas = Respuestaselegidas::find($respuestaselegidas);

        $encuestas = Encuesta::all()->pluck('full_name','id');

        $respuestas = Respuestas::all()->pluck('full_name','id');


        return view('respuestaselegidas/edit',['respuesta_elegida'=> $respuestaselegidas, 'encuestas'=>$encuestas, 'respuestas'=>$respuestas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, respuestaselegidas $respuestaselegidas)
    {
        $this->validate($request, [

            'encuesta_id' => 'required|exits:encuestas,id',
            'respuesta_id'=>'required|exits:respuestas,id',



        ]);
        $respuestaselegidas = RespuestasElegidas::find($respuestaselegidas);
        $respuestaselegidas->fill($request->all());

        $respuestaselegidas->save();

        flash('Respuestas Elegidas modificada correctamente');

        return redirect()->route('respuestas_elegidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuestaselegidas $respuestaselegidas)
    {
        $respuestaselegidas = Respuestaselegidas::find($respuestaselegidas);
        $respuestaselegidas->delete();
        flash('Respuestas elegidas borrada correctamente');

        return redirect()->route('respuestaselegidas.index');
    }
}
