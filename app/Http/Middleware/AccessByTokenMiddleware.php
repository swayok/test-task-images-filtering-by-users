<?php

declare(strict_types=1);


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessByTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->get('token') !== config('auth.admin_token')) {
            abort(403);
        }
        return $next($request);
    }
}
