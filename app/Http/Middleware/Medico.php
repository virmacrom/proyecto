<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Medico
{

    protected $auth;
    public function _construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        switch($this->auth->user()->idrol){
            case '1':
                //return redirect()->to('medico');
                break;

            case '2':
                return redirect() ->to('paciente');
                break;

            default:
                return reditect()->to('login');
        }
        return $next($request);
    }
}
