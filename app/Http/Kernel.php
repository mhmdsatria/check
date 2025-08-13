<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

// Tambahkan import middleware yang dibutuhkan
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Http\Middleware\TrimStrings;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        TrustProxies::class,
        PreventRequestsDuringMaintenance::class,
        TrimStrings::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    // protected $middlewareAliases = [
    //     'auth' => Authenticate::class,
    //     'guest' => RedirectIfAuthenticated::class,
    //     'role' => \App\Http\Middleware\RoleMiddleware::class,
    // ];
    protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'role' => \App\Http\Middleware\RoleMiddleware::class, // <-- ini harus ada
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
];


}
