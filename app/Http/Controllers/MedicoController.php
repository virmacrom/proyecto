<?php

namespace App\Http\Controllers;

use App\Medico;
use App\Especialidad;
use Illuminate\Http\Request;

class MedicoController extends Controller
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
        $medicos = Medico::all();
        if($request->ajax()){
            return response()->json([
                'data'=>$medicos
            ]);
        }
        return view('medicos/index',['medicos'=>$medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('medicos/create',['especialidades'=>$especialidades]);
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
            'surname' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'code'=> 'required|max:255',
            'consulta'=>'required|max:255'
        ]);
        $medico = new Medico($request->all());
        $medico->save();

        // return redirect('especialidades');

        flash('Medico creado correctamente');

        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$medicos = Medico::find($id);
          comentado por que no esta bien
        return redirect()->route('medicos.index');*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::find($id);

        $especialidades = Especialidad::all()->pluck('name','id');


        return view('medicos/edit',['medico'=> $medico, 'especialidades'=>$especialidades ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'code'=>'required|max:255',
            'consulta'=>'required|max:255'
        ]);

        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();

        flash('Medico modificado correctamente');

        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $medico = Medico::find($id);
        $medico->delete();
        $message='Medico borrado correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('medicos.index');
    }

    public function pacientesdeunmedico($id){
        $pacientes=Medico::find($id)->pacientes;


        foreach($pacientes as $paciente){
            $paciente->valido=true;
            $pacientes->save();
        }


    }

    public function citasdeunmedico($id){

        $citas=Medico::find($id)->citas;
            $citas->save();



    }
}
