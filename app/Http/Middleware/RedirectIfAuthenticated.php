<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use function dd;
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
    public function handle($request, Closure $next, $guard = 'user')
    {
        switch($guard){
        case 'user':
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::USER_HOME);
            }
            break;
        default:
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
            break;
    }
        return $next($request);
    }
}
