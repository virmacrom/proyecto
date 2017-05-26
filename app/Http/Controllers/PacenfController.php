<?php

namespace App\Http\Controllers;

use App\Pacenf;
use Illuminate\Http\Request;
use App\Enfermedad;
use App\Paciente;


class PacenfController extends Controller
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
        $pacenfs = Pacenf::all();

        return view('pacenfs/index',['pacenfs'=>$pacenfs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enfermedades = Enfermedad::all()->pluck('name','id');

        $pacientes = Paciente::all()->pluck('name','id');


        return view('pacenfs/create',['enfermedades'=>$enfermedades, 'pacientes'=>$pacientes]);
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
            'enfermedad_id' => 'required|exists:enfermedades,id',
            'paciente_id' => 'required|exists:pacientes,id',

        ]);

        $pacenf = new Pacenf($request->all());
        $pacenf->save();


        flash('creada correctamente');

        return redirect()->route('pacenfs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pacenf = Pacenf::find($id);

        $enfermedades = Enfermedad::all()->pluck('name','id');

        $pacientes = Paciente::all()->pluck('name','id');


        return view('pacenfs/edit',['pacenf'=> $pacenf, 'enfermedades'=>$enfermedades, 'pacientes'=>$pacientes]);
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
            'enfermedad_id' => 'required|exists:enfermedades,id',
            'paciente_id' => 'required|exists:pacientes,id',

        ]);
        $pacenf = Pacenf::find($id);
        $pacenf->fill($request->all());

        $pacenf->save();

        flash('modificada correctamente');

        return redirect()->route('pacenfs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacenf = Pacenf::find($id);
        $pacenf->delete();
        flash('borrada correctamente');

        return redirect()->route('pacenfs.index');
    }

}
