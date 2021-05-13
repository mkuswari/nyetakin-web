<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Maaf, saat ini kamu tidak memiliki hak akses');
    }
}
