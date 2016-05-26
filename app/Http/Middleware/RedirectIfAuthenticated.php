<?php

namespace papusclub\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
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
                case '5':
                    return redirect('/gerente');
                    break;
                default:
                    return redirect('/');
                    break;
            }
        }

        return $next($request);
    }
}
