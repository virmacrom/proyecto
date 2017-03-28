<?php

namespace App\Http\Controllers;

use App\Encuesta;
use App\respuestas_elegidas;
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
        return view('respuestaselegidas/create',['encuestas'=>$encuestas]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\respuestas_elegidas  $respuestas_elegidas
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuestas_elegidas $respuestas_elegidas)
    {
        //
    }
}
