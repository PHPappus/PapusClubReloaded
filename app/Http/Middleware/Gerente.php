<?php

namespace papusclub\Http\Middleware;

use Closure;

class Gerente
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
        if (\Auth::user()->perfil_id != '5') {
            $request->session()->flash('message-error', 'Usted no esta autorizado!.');
            $request->session()->flash('alert-class', 'alert-danger');
            switch (\Auth::user()->perfil_id) {
                case '1':
                    return redirect('/socio');
                    break;
                case '2':
                    return redirect('/admin-general');
                    break;
                case '3':
                    return redirect('/admin-pagos');
                    break;
                case '4':
                    return redirect('/admin-registros');
                    break;
                /*case '5':
                    return redirect('/gerente');
                    break;*/
                case '6':
                    return redirect('/admin-persona');
                    break;
                case '7':
                    return redirect('/admin-reserva');
                    break;
                case '8':
                    return redirect('/control-ingresos');
                    break;
                case '9':
                    return redirect('/socio-suspendido');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }
        return $next($request);
    }
}
