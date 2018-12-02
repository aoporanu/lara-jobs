<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware {
    public function handle($request, Closure $next)
    {
        if($request->role == 'client') {
            return redirect('/');
        }

        return $next($request);
    }
}
