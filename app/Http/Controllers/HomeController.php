<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Medico;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(Auth::user()->medico);
      //  dd(Auth::user()->medico());

        return view('home');
        /*if(Auth::user()->medico){
            return view('/homemedico');
        }

        else if (Auth::user()->paciente){
            return view('/homepaciente');
        }*/

    }
}
