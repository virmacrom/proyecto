<?php

namespace App\Http\Controllers\Auth;

use App\Medico;
use App\Paciente;
use App\User;
use App\Especialidad;
use App\Sas;
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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        if (isset($data['code'])) {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'address' => 'required|max:255',
                'telephone' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'code' => 'required|max:255',
                'consulta' => 'required|max:255',
                'especialidad_id' => 'required|exists:especialidads,id',
                'user_id' => 'exists:users,id',


            ]);

        } else if (isset($data['nuhsa'])) {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'address' => 'required|max:255',
                'telephone' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'nuhsa' => 'required|max:255',
                'dni' => 'required|max:255',
                'operado' => 'required|max:255',
                'user_id' => 'exists:users,id',

            ]);

        } else if (isset($data['codesas'])) {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'surname' => 'required|max:255',
                'address' => 'required|max:255',
                'telephone' => 'required|max:255',
                'codesas' => 'required|max:255',
                'user_id' => 'exists:users,id',
            ]);
        }


    }


    public function showRegistrationMedico()
    {
        //Pasarle el array de especialidadees, es un array de clave valor, string numero
        $especialidades = Especialidad::all()->pluck('name', 'id');

        return view('auth.registermedico', ['especialidades' => $especialidades]);

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

        if (isset($data['code'])) {
            $medico = new Medico();
            $medico->code = $data['code'];
            $medico->consulta = $data['consulta'];
            $medico->especialidad_id = $data['especialidad_id'];
            $medico->user_id = $user->id;
            $medico->save();
        } else if (isset($data['nuhsa'])) {
            $paciente = new Paciente();
            $paciente->nuhsa = $data['nuhsa'];
            $paciente->dni = $data['dni'];
            $paciente->operado = $data['operado'];
            $paciente->user_id = $user->id;
            $paciente->save();
        } else if (isset($data['codesas'])) {
            $sas = new Sas();
            $sas->codesas = $data['codesas'];
            $sas->user_id = $user->id;
            $sas->save();

        }
        return $user;
    }

}


