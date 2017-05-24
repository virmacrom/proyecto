<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Encuesta
{

    protected $auth;
    public function _construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.

     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)  /*si es medico o paciente cierra la sesion y sale un error y redirecciona a login*/
    {

        if ($this->auth->user()-> medico || $this->auth->user()-> paciente ) {
            $this->auth->logout();
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->to('auth/login');
            }
        }
        else{
            return redirect()->to('encuestas/create');
        }

     /*   switch($this->auth->user()->idrol){
            case '1':
                //return redirect()->to('medico');
                break;

            case '2':
                return redirect() ->to('paciente');
                break;

            default:
                return reditect()->to('login');
        }*/
        return $next($request);
    }
}
