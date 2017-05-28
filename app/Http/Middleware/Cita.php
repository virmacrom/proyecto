<?php

namespace App\Http\Middleware;

use Closure;

class Medico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()-> medico || $this->auth->user()-> sas) {
           abort(403, "No tienes autorización para pedir una cita");
        }
        else{
            return redirect()->to('citas/create');
        }

        return $next($request);
    }
}
