<?php

namespace App\Http\Controllers;

use App\Sas;
use Illuminate\Http\Request;
use League\Flysystem\SafeStorage;

class sasController extends Controller
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
        $sas = Sas::all();

        return view('sas/index',['sas'=>$sas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sas/create');
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
            'codesas' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',


        ]);


        $sas = new Sas($request->all());
        $sas->save();


        flash('Sas creado correctamente');

        return redirect()->route('sas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sas  $sas
     * @return \Illuminate\Http\Response
     */
    public function show(sas $sas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sas  $sas
     * @return \Illuminate\Http\Response
     */
    public function edit(sas $id)
    {
        $sas = Sas::find($id);

        return view('sas/edit',['sas'=> $sas ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sas  $sas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sas $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'codesas' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',


        ]);

        $sas = Sas::find($id);
        $sas->fill($request->all());

        $sas->save();

        flash('Sas modificado correctamente');

        return redirect()->route('sas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sas  $sas
     * @return \Illuminate\Http\Response
     */
    public function destroy(sas $sas)
    {
        $sas = Sas::find($sas);
        $sas->delete();
        flash('sas borrada correctamente');

        return redirect()->route('sas.index');
    }
}
