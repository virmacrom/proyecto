<?php

namespace App\Http\Controllers;

use App\TipoEncuesta;
use Illuminate\Http\Request;

class TipoEncuestaController extends Controller
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
        $tipoencuestas= TipoEncuesta::all();
        return view('tipoencuestas/index',['tipoencuestas'=>$tipoencuestas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposencuestas/create');
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
            'name'=>'required|max:255'
        ]);
        $tipoencuesta= new TipoEncuesta($request->all());
        $tipoencuesta->save();

        flash('Tipo encuesta creado correctamente');
        return redirect()->route('tipoencuestas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tipoencuestas/show',['tipoencuesta'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoencuesta = TipoEncuesta::find($id);

        return view('tipoencuestas/edit',['tipoencuesta'=> $tipoencuesta]);

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
        $this->validate($request,[
            'name'=>'required|max:255'
        ]);
        $tipoencuesta= new TipoEncuesta($request->all());
        $tipoencuesta->save();

        flash('Tipo encuesta creado correctamente');
        return redirect()->route('tipoencuestas.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoencuesta = TipoEncuesta::find($id);
        $tipoencuesta->delete();
        flash('Tipo encuesta borrada correctamente');

        return redirect()->route('tipoencuestas.index');
    }
}
