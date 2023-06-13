<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        // WebService REST
        // Albert: Añadimos esta ruta para que no esté protegida por el token csrf
        '/rest/acto/getAll'
    ];
}
