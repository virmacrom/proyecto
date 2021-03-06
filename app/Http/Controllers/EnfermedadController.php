<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Especialidad;
use App\Sas;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
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
        $enfermedad = Enfermedad::all();
        if($request->ajax()){
            return response()->json([
                'data'=>$enfermedad
            ]);
        }
        return view('enfermedades/index')->with('enfermedades', $enfermedad);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidad = Especialidad::all()->pluck('name','id');
        //$sas = Sas::all()->pluck('name','id');

        return view ('enfermedades/create',['especialidades'=>$especialidad]);
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
            'name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',
            //'sas_id' => 'required|exists:sas,id',
        ]);

        //
        $enfermedad = new Enfermedad($request->all());
        $enfermedad->save();

        // return redirect('enfermedades');

        flash('Enfermedad creada correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enfermedad = Enfermedad::find($id);
        $especialidad = Especialidad::all()->pluck('name','id');
        //$sas = Sas::all()->pluck('name','id');


        return view('enfermedades/edit',['enfermedad'=>$enfermedad,'especialidad'=>$especialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',
            //'sas_id' => 'required|exists:sass,id',
        ]);

        $enfermedad = Enfermedad::find($id);
        $enfermedad->fill($request->all());

        $enfermedad->save();

        flash('Enfermedad modificada correctamente');

        return redirect()->route('enfermedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\enfermedad  $enfermedad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $enfermedad = Enfermedad::find($id);
        $enfermedad->delete();

        $message='Enfermedad borrada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('enfermedades.index');
    }

    public function destroyAll(Request $request)
    {
        Enfermedad::truncate();
        $message='Enfermedades borradas correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('enfermedades.index');

    }
}
