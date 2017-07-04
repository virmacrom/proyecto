<?php

namespace App\Http\Controllers;

use App\Especialidad;
use App\Enfermedad;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
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
        $especialidades=Especialidad::all();
        if($request->ajax()){
            return response()->json([
                'data'=>$especialidades
            ]);
        }
       return view('especialidades/index')->with('especialidades',$especialidades);

    }

    public function listall(Request $request){
        $especialidades=Especialidad::all();
        if($request->ajax()){
            return response()->json([
                'data'=>$especialidades
            ]);
        }
       // return view ('especialdiades/listall')->with('especialidades',$especialidades);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('especialidades/create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->ajax()){
            Especialidad::create($request->all());
            return response()->json([
                "mensaje" => "creado"
            ]);
        }
     /*  $prueba = json_encode("hola");
        return $prueba;*/
       // return redirect()->route('especialidades.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $especialidad = Especialidad::find($id);
        //$sas = Sas::all()->pluck('name','id');

        return view('especialidades/edit')->with('especialidad', $especialidad);  //, ['sas'=>$sas]
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            //'sas_id' => 'required|exists:sas,id',
        ]);

        $especialidad = Especialidad::find($id);
        $especialidad->fill($request->all());

        $especialidad->save();

        $message='Especialidad modificada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('especialidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {

        //abort(500);
        $especialidad = Especialidad::find($id);
        $especialidad->delete();

        $message='Especialidad borrada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

    Session::flash('message',$message);
        return redirect()->route('especialidades.index');
    }

    public function destroyAll(Request $request)
    {
        Especialidad::truncate();
        $message='Especialidad borrada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('especialidades.index');
    }

}
