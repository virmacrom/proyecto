<?php

namespace App\Http\Controllers\Auth;

use App\Medico;
use App\Paciente;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function showRegistrationForm()
    {
        //Pasarle el array de especialidadees, es un array de clave valor, string numero


        return view('auth.register');


    }

    protected function create(array $data)
    {
         $user = User::create([
             'name' => $data['name'],
             'surname' => $data['surname'],
             'address' => $data['address'],
             'telephone' => $data['telephone'],
             'email' => $data['email'],
             'password' => bcrypt($data['password']),
         ]);

        if($data['code'] != null){
            $medico= new Medico();
            $medico->code = $data['code'];
            $medico->consulta = $data['consulta'];
            $medico->especialidad_id =$data['especialidad_id'];
            $medico->save();
        }
        else if($data['nuhsa'] != null){
            $paciente= new Paciente();
            $paciente->nuhsa = $data['nuhsa'];
            $paciente->dni = $data['dni'];
            $paciente->operado =$data['operado'];
            $paciente->save();
        }
        return $user;
    }

   /* public function redirectPath()
    {
        if(auth()->user()->medico){
            return '/especialidades';
        }

        return '/home';
    }*/


    //$medico = 'user_id' => $user->id


        /*return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'address' => $data['address'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
}
