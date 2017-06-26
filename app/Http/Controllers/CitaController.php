<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use Illuminate\Support\Facades\Auth;


class CitaController extends Controller
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
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('fullname','id');

        return view('citas/create',['medicos'=>$medicos]);
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
            'medico_id' => 'required|exists:medicos,id',
            'fechacita' => 'required|date|after:now',

        ]);

        $cita = new Cita($request->all());
        $cita->paciente_id = Auth::user()->paciente->id;
        $cita->save();


        $message='Cita creada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $citas = Cita::find($id);

        return view('citas/show',['citas'=>$citas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('fullname','id');

        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos]);
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
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'fechacita' => 'required|date|after:now',

        ]);
        $cita = Cita::find($id);
        $cita->fill($request->all());
        $cita->paciente_id = Auth::user()->paciente->id;
        $cita->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $cita = Cita::find($id);
        $cita->delete();

        $message='Cita borrada correctamente';
        if($request->ajax()){
            return response()->json([
                'message'=>$message
            ]);
        }

        Session::flash('message',$message);
        return redirect()->route('citas.index');
    }

}
