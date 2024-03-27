<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $middleware = [
    // Other middleware
    \App\Http\Middleware\VerifyCsrfToken::class,
];

protected $middlewareGroups = [
    'api' => [
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],
    // Other middleware groups
];

}
?>