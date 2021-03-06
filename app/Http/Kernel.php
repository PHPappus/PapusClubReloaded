<?php

namespace papusclub\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \papusclub\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \papusclub\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \papusclub\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \papusclub\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'socio' => \papusclub\Http\Middleware\Socio::class,
        'gerente' => \papusclub\Http\Middleware\Gerente::class,
        'admingeneral' => \papusclub\Http\Middleware\AdminGeneral::class,
        'adminpagos' => \papusclub\Http\Middleware\AdminPagos::class,
        'adminregistros' => \papusclub\Http\Middleware\AdminRegistros::class,
        'adminpersona' => \papusclub\Http\Middleware\AdminPersona::class,
        'adminreserva' => \papusclub\Http\Middleware\AdminReserva::class,
        'controlingresos' => \papusclub\Http\Middleware\ControlIngresos::class,
        'sociosuspendido' => \papusclub\Http\Middleware\SocioSuspendido::class,
    ];
}
