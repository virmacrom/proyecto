<?php

namespace App\Http\Controllers;

use App\Tipoencuesta;
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
        $tipoencuestas= Tipoencuesta::all();
        return view('tipoencuestas/index')->with('tipoencuestas',$tipoencuestas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoencuestas/create');
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
        $tipoencuesta= new Tipoencuesta($request->all());
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
      //  return view('tipoencuestas/show',['tipoencuesta'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoencuesta = Tipoencuesta::find($id);

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
        $tipoencuesta= Tipoencuesta::find($id);
        $tipoencuesta->fill($request->all());
        $tipoencuesta->save();

        flash('Tipo encuesta modificada correctamente');
        return redirect()->route('tipoencuestas.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $tipoencuesta = Tipoencuesta::find($id);
        $tipoencuesta->delete();

        $message='Tipo Encuesta borrado correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('tipoencuestas.index');
    }

    public function destroyAll(Request $request)
    {
        Tipoencuesta::truncate();

        $message='Tipo Encuestas borrados correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('tipoencuestas.index');
    }
}
