<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\site\MedicController;

class MedicAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if (auth()->check() && in_array(auth()->user()->level, [3, 1])) {
        return $next($request);
    }

    // User does not have access, return a response indicating unauthorized access
    return new Response('Não autorizado', 403);
}
}
