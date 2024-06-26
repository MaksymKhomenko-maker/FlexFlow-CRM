<?php

namespace Modules\CyberSecurity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\CyberSecurity\Entities\BlacklistEmail;

class BlackListEmailMiddleware
{

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {

            if (auth()->check() && BlacklistEmail::where('email', auth()->user()->email)->exists()) {
                abort(403, __('cybersecurity::messages.blacklistEmail'));
            }

        return $next($request);
    }

}
