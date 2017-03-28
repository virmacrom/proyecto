<?php

namespace App\Http\Controllers;

use App\sas;
use Illuminate\Http\Request;

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

        return view('sas/index',['citas'=>$sas]);
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
        //
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
    public function edit(sas $sas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sas  $sas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sas $sas)
    {
        //
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
