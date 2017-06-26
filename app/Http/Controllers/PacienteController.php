<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Citas;
use Illuminate\Http\Request;

class PacienteController extends Controller
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
        $pacientes = Paciente::all();

        return view('pacientes/index',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes/create');
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
            'nuhsa' => 'required|max:255',
            'dni' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'operado' => 'required|max:255',

        ]);

        $paciente = new Paciente($request->all());
        $paciente->save();


        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
   public function show($paciente_id)
    {
        $pacientes = Paciente::find($paciente_id);


        return view('pacientes/show',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);

        return view('pacientes/edit',['paciente'=> $paciente ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|max:255',
            'dni' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'operado' => 'required|max:255',




        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        $message='Paciente borrado correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('pacientes.index');
    }
}
